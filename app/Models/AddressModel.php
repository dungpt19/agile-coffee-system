<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table = 'address';
    protected $allowedFields = ['account', 'address'];
    public function getUserAddress($uid = null)
    {
        return $this->asArray()
            ->select('address')
            ->where(['account' => $uid])
            ->findAll();
    }
    public function getLastestUserAddress($uid = null, $address = null)
    {
        return $this->asArray()
            ->select('address')
            ->where(['account' => $uid, 'address'=>$address])
            ->find();
    }
    public function getLastestAddressID($uid = null, $address = null)
    {
        return $this->asArray()
            ->select('id')
            ->where(['account' => $uid, 'address'=>$address])
            ->find();
    }
}
