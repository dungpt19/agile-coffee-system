<?php

namespace App\Models;

use CodeIgniter\Model;

class Accountmodel extends Model
{
    protected $table = 'account';
    protected $allowedFields = ['email', 'username', 'fullname', 'gender', 'date_of_birth', 'phone_number','password_hash', 'created_at'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        $data['data']['created_at'] = date('Y-m-d H:i:s');

        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password_hash'])) {
            $data['data']['password_hash'] = password_hash($data['data']['password_hash'], PASSWORD_DEFAULT);
        }

        return $data;
    }

    public function getUser($uid = null)
    {
        return $this->asArray()
            ->where(['id' => $uid])
            ->first();
    }
}