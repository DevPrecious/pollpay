<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AuthController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Pollpay Login'
        ];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email',
                    'label' => 'Email Address',
                ],
                'password' => [
                    'rules' => 'required|min_length[6]|validateUser[email,password]',
                    'label' => 'Password'
                ],
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t exists'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new User();
                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();


                $this->setUserSession($user);
                return redirect()->to('/feed');
            }
        }

        return view('auth/login', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'user_id' => $user['user_id'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [
            'title' => 'Pollpay Register'
        ];
        helper(['form']);

        if ($this->request->getMethod() == "post") {
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email|is_unique[users.email]',
                    'label' => 'Email Address'
                ],
                'firstname' => [
                    'rules' => 'required|min_length[3]|max_length[20]',
                    'label' => 'First Name'
                ],
                'lastname' => [
                    'rules' => 'required|min_length[3]|max_length[20]',
                    'label' => 'Last Name'
                ],
                'password' => [
                    'rules' => 'required|min_length[6]|max_length[20]',
                    'label' => 'Password'
                ],
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new User();
                $fullname = $this->request->getVar('firstname') . " " . $this->request->getVar('lastname');
                $saveData = [
                    'fullname' => $fullname,
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($saveData);
                $session = session();
                $session->setFlashdata('success', 'Successfully Registered');
                return redirect()->to('/login');
            }
        }

        return view('auth/register', $data);
    }
}
