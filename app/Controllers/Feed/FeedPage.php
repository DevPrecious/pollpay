<?php

namespace App\Controllers\Feed;

use App\Controllers\BaseController;
use App\Models\User;

class FeedPage extends BaseController
{
    public $user_id, $user;

    public function __construct()
    {
        $this->user_id = session()->get('user_id');
        $model = new User();
        $this->user = $model->find($this->user);
    }

    public function index()
    {
        $title = $this->user[0]['fullname'] . " " . "PollPay";
        $data = [
            'title' => $title,
            'user' => $this->user
        ];
        return view('feed/feed', $data);
    }
}