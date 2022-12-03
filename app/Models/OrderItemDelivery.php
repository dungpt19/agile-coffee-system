<?php

namespace App\Models;

use CodeIgniter\Model;



class OrderItemDelivery extends Model
{
    protected $table = "order_item_delivery";
    protected $allowedFields = ['order_id', 'product_id', 'quantity', 'size', 'sweetness', 'milk', 'total_amount'];

    public function orderDetails($user_id, $order_id)
    {
        return $this->asArray()
            ->where(['order_delivery.id' => $order_id, 'order_delivery.user_id' => $user_id])
            ->join('order_delivery', 'order_item_delivery.order_id = order_delivery.id')
            ->join('coffee_list', 'product_id = coffee_list.id')
            ->select('order_item_delivery.id as id, quantity, size, sweetness, milk, order_item_delivery.total_amount as total_amount, coffee_name')
            ->findAll();
    }
}
