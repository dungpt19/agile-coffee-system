<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart_item';
    protected $allowedFields = ['user_id', 'product_id', 'size', 'quantity', 'sweetness', 'milk', 'total_amount'];
    public function getUserCart($uid = null)
    {
        return $this->asArray()
            ->select('cart_item.id, product_id, coffee_name, size, quantity, sweetness, milk, total_amount')
            ->join('coffee_list', 'coffee_list.id = product_id')
            ->where(['user_id' => $uid])
            ->findAll();
    }
    public function findDupes($pid = NULL, $size = NULL, $sweetness = NULL, $milk = NULL)
    {
        return $this->asArray()
            ->where(['product_id' => $pid, 'size' => $size, 'sweetness' => $sweetness, 'milk' => $milk])
            ->find();
    }
    public function DeleteItem($cart_id = null)
    {
        $this->where(['id' => $cart_id])
            ->delete();
    }
    public function DeleteAllItem($user_id = null)
    {
        $this->where(['user_id' => $user_id])
            ->delete();
    }
}
