<?php

namespace App\Controllers;

use App\Models\Accountmodel;
use App\Models\CartModel;

class Account extends BaseController
{
    public function index()
    {
        echo '<h1>Account Pages</h1>';
    }

    public function login()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|validateUser[email, password]',
            ];

            $errors = [
                'email' => [
                    'required' => 'Vui lòng nhập Email.',
                    'valid_email' => 'Email không hợp lệ.',
                ],
                'password' => [
                    'validateUser' => 'Sai Email hoặc mật khẩu.',
                    'required' => 'Vui lòng nhập Mật khẩu.',
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new Accountmodel();

                $user = $model->where('email', $this->request->getVar('email'))->first();

                $this->setUserSession($user);

                return redirect()->to('/');
            }
        }

        echo view('templates/header', $data);
        echo view('pages/login');
        echo view('templates/footer');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'fullname' => $user['fullname'],
            'gender' => $user['gender'],
            'date_of_birth' => $user['date_of_birth'],
            'phone_number' => $user['phone_number'],
            'isLoggedIn' => true,
        ];

        session()->set($data);

        return true;
    }

    public function register()
    {
        $data = [];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[account.email]',
                'username' => 'required|min_length[3]|max_length[20]',
                'password' => 'required|min_length[8]|max_length[50]',
                'password_confirm' => 'matches[password]',
            ];

            $errors = [
                'email' => [
                    'required' => 'Vui lòng nhập Email.',
                    'min_length' => 'Email phải có ít nhất {param} ký tự.',
                    'max_length' => 'Email chỉ tối đa {param} ký tự.',
                    'valid_email' => 'Email không hợp lệ.',
                    'is_unique' => 'Email đã có người sử dụng.',
                ],
                'username' => [
                    'is_unique' => 'Tên đăng nhập đã tồn tại.',
                    'required' => 'Vui lòng nhập Tên đăng nhập.',
                    'min_length' => 'Tên đăng nhập phải có ít nhất {param} ký tự.',
                    'max_length' => 'Tên đăng nhập chỉ tối đa {param} ký tự.',
                ],
                'password' => [
                    'required' => 'Vui lòng nhập Mật khẩu.',
                    'min_length' => 'Mật khẩu phải có ít nhất {param} ký tự.',
                    'max_length' => 'Mật khẩu chỉ tối đa {param} ký tự.',
                ],
                'password_confirm' => [
                    'matches' => 'Mật khẩu xác nhận không trùng khớp',
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new Accountmodel();
                $date_of_birth = $this->request->getVar('date_of_birth');
                $newData = [
                    'username' => $this->request->getVar('username'),
                    'password_hash' => $this->request->getVar('password'),
                    'email' => $this->request->getVar('email'),
                    'fullname' => $this->request->getVar('fullname'),
                    'gender' => 'Male',
                    'date_of_birth' => '2000/01/01',
                    'phone_number' => $this->request->getVar('phone_number'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Đăng ký thành công!');
                $user = $model->where('email', $this->request->getVar('email'))->first();

                $this->setUserSession($user);

                return redirect()->to('/');
            }
        }

        echo view('templates/header', $data);
        echo view('pages/register');
        echo view('templates/footer');
    }

    public function logout()
    {
        
        $sessionData = [
            'id',
            'username',
            'email',
            'fullname',
            'gender',
            'date_of_birth',
            'phone_number',
            'isLoggedIn',
        ];
        session()->remove($sessionData);
        // header("Refresh:0; url=home.php");
        return redirect()->to(base_url());
    }

    public function user()
    {
        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/account/login');
        } else {
            $accountModel = new Accountmodel();
            $data['account'] = $accountModel->where('id', session()->get('id'))->first();
            echo view('templates/header', $data);
            echo view('pages/user');
            echo view('templates/footer');
        }
    }


    public function update()
    {
        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/account/login');
        } else {
            $user_id = session()->has('id') ? session()->get('id') : NULL;
            $accountModel = new Accountmodel();
            $cart_model = new CartModel();
            helper(['form']);

            if ($this->request->getMethod() == 'post') {
                $rules = [
                    'username' => 'required|min_length[3]|max_length[20]',
                ];

                if ($this->request->getPost('password') != '') {
                    $rules['password'] = 'required|min_length[8]|max_length[50]';
                    $rules['password_confirm'] = 'matches[password]';
                }

                $errors = [
                        'username' => [
                            'required' => 'Vui lòng nhập Tên đăng nhập.',
                            'min_length' => 'Tên đăng nhập phải có ít nhất {param} ký tự.',
                            'max_length' => 'Tên đăng nhập chỉ tối đa {param} ký tự.',
                        ],
                        'password' => [
                            'required' => 'Vui lòng nhập Mật khẩu.',
                            'min_length' => 'Mật khẩu phải có ít nhất {param} ký tự.',
                            'max_length' => 'Mật khẩu chỉ tối đa {param} ký tự.',
                        ],
                        'password_confirm' => [
                            'matches' => 'Mật khẩu xác nhận không trùng khớp',
                        ],
                    ];

                if (!$this->validate($rules, $errors)) {
                    $data['validation'] = $this->validator;
                } else {
                    $model = new Accountmodel();
                    $date_of_birth = $this->request->getVar('date_of_birth');
                    $newData = [
                            'id' => session()->get('id'),
                            'username' => $this->request->getVar('username'),
                            'fullname' => $this->request->getVar('fullname'),
                            'gender' => $this->request->getVar('gender') ?: session()->get('gender'),
                            'date_of_birth' => date("Y-m-d", strtotime($date_of_birth)),
                            'phone_number' => $this->request->getVar('phone_number'),
                        ];
                    if ($this->request->getPost('password') != '') {
                        $newData['password_hash'] = $this->request->getVar('password');
                    }
                    $model->save($newData);
                    $session = session();
                   
                    $session->setFlashdata('success', 'Cập nhật thông tin thành công');
                    $session->set($newData);
                    echo "<script>alert('Cập nhật thông tin thành công');</script>";
                    return redirect()->to('/user');
                }
            }
            $data['user'] = $accountModel->where('id', session()->get('id'))->first();
            $data["cart_item"] = $cart_model->getUserCart($user_id);
            echo view('templates/header', $data);
            echo view('pages/update');
            echo view('templates/footer');
        }
    }
}