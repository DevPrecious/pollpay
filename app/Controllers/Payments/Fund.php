<?php

namespace App\Controllers\Payments;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Wallet;

class Fund extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [
            'title' => 'Fund Account'
        ];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'amount' => 'required'
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new User();
                $user = $model->find(session()->get('user_id'));
                $curl = curl_init();

                $email = $user['email'];
                $amount = $this->request->getVar('amount');  //the amount in kobo. This value is actually NGN 300

                // Store sessions
                $ses_store = [
                    'user_id' => session()->get('user_id'),
                    'amount' => $amount
                ];

                session()->set('ses_store', $ses_store);
                // dd(session()->get('ses_store'));

                // url to go to after payment
                $callback_url = '/callback';

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode([
                        'amount' => $amount,
                        'email' => $email,
                        'callback_url' => $callback_url
                    ]),
                    CURLOPT_HTTPHEADER => [
                        "authorization: Bearer sk_test_2b810b3656e15df277a22ff2ecff66f8183f2f12", //replace this with your own test key
                        "content-type: application/json",
                        "cache-control: no-cache"
                    ],
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                if ($err) {
                    // there was an error contacting the Paystack API
                    die('Curl returned error: ' . $err);
                }

                $tranx = json_decode($response, true);

                if (!$tranx['status']) {
                    // there was an error from the API
                    print_r('API returned error: ' . $tranx['message']);
                }

                // comment out this line if you want to redirect the user to the payment page
                // print_r($tranx);
                // redirect to page so User can pay
                // uncomment this line to allow the user redirect to the payment page
                // header('Location: ' . $tranx['data']['authorization_url']);
                return $this->response->redirect($tranx['data']['authorization_url']);
            }
        }
        return view('payments/fund', $data);
    }

    public function callback()
    {
        $curl = curl_init();
        $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
        if (!$reference) {
            die('No reference supplied');
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer sk_test_2b810b3656e15df277a22ff2ecff66f8183f2f12",
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            // there was an error contacting the Paystack API
            die('Curl returned error: ' . $err);
        }

        $tranx = json_decode($response);

        if (!$tranx->status) {
            // there was an error from the API
            die('API returned error: ' . $tranx->message);
        }

        if ('success' == $tranx->data->status) {
            // transaction was successful...
            // please check other things like whether you already gave value for this ref
            // if the email matches the customer who owns the product etc
            // Give value
            // echo "<h2>Thank you for making a purchase. Your file has bee sent your email.</h2>";
            $model =  new Wallet();
            $ses = session()->get('ses_store');
            $get_wallet = $model->where('user_id', $ses['user_id'])->first();
            $wallet_data = [
                'user_id' => $ses['user_id'],
                'amount' => $ses['amount'],
            ];
            if (empty($get_wallet)) {
                $model->save($wallet_data);
            } else {
                $newamount = $get_wallet['amount'] + $ses['amount'];
                $wallet_data['amount'] = $newamount;
                $model->update($get_wallet['wallet_id'], $wallet_data);
            }
            session()->setFlashData('success', 'Funding successful');
            return redirect()->back();
        }
    }
}
