<?php

namespace App\Validation;

use App\Models\Wallet;

// use App\Models\User;

class CheckBalance
{
    public function checkBalance(string $str, string $fields, array $data)
    {
        // $model = new User();
        $model = new Wallet();
        $userBalance = $model->where('user_id', session()->get('user_id'))
            ->first();

        if ($userBalance <= $data['amount'])
            return false;

        return true;
    }
}
