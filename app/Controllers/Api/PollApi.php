<?php

namespace App\Controllers\Api;

use App\Models\Option;
use App\Models\Poll;
use App\Models\Wallet;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class PollApi extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if ($this->request->getMethod() == 'post' && !empty($this->request->getVar('option'))) {
            $rules = [
                'title' => 'required',
                'amount' => 'required|checkBalance[amount]'
            ];

            $errors = [
                'amount' => [
                    'checkBalance' => 'Insufficient balance'
                ]
            ];


            if (!$this->validate($rules, $errors)) {
                return $this->fail($this->validator->getErrors());
            } else {
                $db = db_connect('default');
                $builder = $db->table('polls');
                $title = $this->request->getVar('title');
                $stoptime = $this->request->getVar('datetostop');
                $amount = $this->request->getVar('amount');
                // get wallet
                $wallet = new Wallet();
                $get_balance = $wallet->where('user_id', session()->get('user_id'))->first();
                $new_balance = $get_balance['amount'] - $amount;
                $pData = [
                    'title' => $title,
                    'end_at' => $stoptime,
                    'user_id' => session()->get('user_id'),
                    'stake' => $amount
                ];
                $newWallet = [
                    'amount' => $new_balance
                ];
                $wallet->update($get_balance['wallet_id'], $newWallet);
                $builder->insert($pData);
                // print_r($db->insertID());
                $poll_id = $db->insertID();
                $option = $this->request->getVar('option');
                // dd($title);
                foreach ($option as $tl => $value) {
                    $model = new Option();
                    // print_r($value);
                    $pollData = [
                        'poll_id' => $poll_id,
                        'option' => $value
                    ];
                    // print_r($model->save($pollData));

                    $model->save($pollData);
                    print_r($pollData);
                }
            }
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
