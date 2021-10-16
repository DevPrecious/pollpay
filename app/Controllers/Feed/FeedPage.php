<?php

namespace App\Controllers\Feed;

use App\Controllers\BaseController;

class FeedPage extends BaseController
{
    public function index()
    {
        dd(session()->get('user_id'));;
    }
}
