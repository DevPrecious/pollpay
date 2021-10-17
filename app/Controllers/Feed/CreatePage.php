<?php

namespace App\Controllers\Feed;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\API\ResponseTrait;

class CreatePage extends BaseController
{
    public $user_id, $user;
    use ResponseTrait;

    public function __construct()
    {
        $this->user_id = session()->get('user_id');
        $model = new User();
        $this->user = $model->find($this->user);
    }

    public function index()
    {
        helper(['form']);
        $data = [
            'title' => 'Create a Poll'
        ];
        return view('feed/create', $data);
    }
}
