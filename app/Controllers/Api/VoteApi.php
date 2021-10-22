<?php

namespace App\Controllers\Api;

use App\Models\Wallet;
use CodeIgniter\RESTful\ResourceController;

class VoteApi extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
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
        //
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
        if ($this->request->getMethod() == 'post') {
            $rules = [
                // 'title' => 'required',
                'staked' => 'required'
            ];

            // $errors = [
            //     'staked' => [
            //         'checkBalanceVote' => 'Insufficient balance'
            //     ]
            // ];
            $model_w = new Wallet();
            $getw = $model_w->where('user_id', session()->get('user_id'))->first();
            if ($getw['amount'] <= $this->request->getVar('staked')) {
                $msg = "Insufficient Balance";
                return $this->fail($msg);
            }

            if (!$this->validate($rules)) {
                return $this->fail($this->validator->getErrors());
            } else {
                $db = db_connect('default');
                $builder = $db->table('votes');
                $staked = $this->request->getVar('staked');
                $poll_id_input = $this->request->getVar('poll_id');
                $option_id = $this->request->getVar('option_id');
                // get wallet
                $wallet = new Wallet();
                $get_balance = $wallet->where('user_id', session()->get('user_id'))->first();
                $new_balance = $get_balance['amount'] - $staked;
                $pData = [
                    'staked' => $staked,
                    'poll_id' => $poll_id_input,
                    'user_id' => session()->get('user_id'),
                    'option_id' => $option_id
                ];
                $newWallet = [
                    'amount' => $new_balance
                ];
                $wallet->update($get_balance['wallet_id'], $newWallet);
                $builder->insert($pData);
                // print_r($db->insertID());
                // $poll_id = $db->insertID();
                // $option = $this->request->getVar('option');
                // // dd($title);
                // foreach ($option as $tl => $value) {
                //     $model = new Option();
                //     // print_r($value);
                //     $pollData = [
                //         'poll_id' => $poll_id,
                //         'option' => $value
                //     ];
                //     // print_r($model->save($pollData));

                //     $model->save($pollData);
                return $this->respondCreated($pData);
                // }
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
