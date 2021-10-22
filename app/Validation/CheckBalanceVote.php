<?php

namespace App\Validation;

use App\Models\Wallet;

class CheckBalanceVote
{
    public function checkBalanceVote(string $str, string $fields, array $data)
    {
        // $model = new User();
        $model = new Wallet();
        $userBalance = $model->where('user_id', session()->get('user_id'))
            ->first();

        if ($userBalance <= $data['staked'])
            return false;

        return true;
    }
}
