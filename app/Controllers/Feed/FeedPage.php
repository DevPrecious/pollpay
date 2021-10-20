<?php

namespace App\Controllers\Feed;

use App\Controllers\BaseController;
use App\Models\Option;
use App\Models\Poll;
use App\Models\User;
use CodeIgniter\I18n\Time;

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
        $time = new Time();
        $title = $this->user[0]['fullname'] . " " . "PollPay";
        $pollModel = new Poll();
        $pollOptionModel = new Option();
        $polls = array_map(function ($poll)
        use ($pollOptionModel) {
            $poll['options'] = $pollOptionModel->where('poll_id', $poll['poll_id'])->find();
            return $poll;
        }, $pollModel->orderBy('polls.created_at', 'DESC')->find());
        // $polls = $pollModel->join('options', 'options.poll_id = polls.poll_id')
        //     ->orderBy('options.poll_id')->findAll();
        // dd($polls);
        $data = [
            'title' => $title,
            'user' => $this->user,
            'polls' => $polls,
            'time' => $time
        ];
        return view('feed/feed', $data);
    }
}
