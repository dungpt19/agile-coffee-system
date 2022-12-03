<?php

namespace App\Models;

use CodeIgniter\Model;



class OrderDelivery extends Model
{
    protected $table = "order_delivery";
    protected $createdField  = 'ordered_at';
    protected $allowedFields = ['user_id', 'user_payment_id', 'address_id', 'total_amount', 'status'];

    public function getAllOrder($user_id, $status = -1)
    {
        $query =  $this->asArray()
            ->join('order_item_delivery', 'order_item_delivery.order_id = order_delivery.id', 'left');

        if ($status != -1) {
            $query = $query->where('order_delivery.status', $status);
        }

        return $query->groupBy('order_delivery.id')
            ->where(['user_id' => $user_id])
            ->selectSum('quantity')
            ->select('order_delivery.id as order_id, order_item_delivery.id, order_delivery.total_amount as total_amount_order, status, ordered_at')
            ->findAll();
    }
    public function getLastestOrderID($uid = null)
    {
        return $this->asArray()
            ->select('id')
            ->limit(1)
            ->where(['user_id' => $uid])
            ->orderBy('id',"DESC")
            ->find();
    }
}
