<?php

namespace App\Controllers;

use App\Models\OrderDelivery;
use App\Models\CartModel;

class History extends BaseController
{

    public function index()
    {
        $order_delivery_model = new OrderDelivery();
        $cart_model = new CartModel();

        $user_id = session()->has('id') ? session()->get('id') : NULL;

        $data_history = [
            'list_orders' => $order_delivery_model->getAllOrder($user_id),
            'unconfirm' => 0,
            'confirm' => 0,
            'delivering' => 0,
            'delivered' => 0,
            'cancelled' => 0,
        ];

        $data = [
            'cart_item' => $cart_model->getUserCart($user_id),
        ];

        // get num of type
        foreach ($data_history['list_orders'] as $row)
            if ($row['status'] == 0)
                $data_history['unconfirm']++;
            elseif ($row['status'] == 1)
                $data_history['confirm']++;
            elseif ($row['status'] == 2)
                $data_history['delivering']++;
            elseif ($row['status'] == 3)
                $data_history['delivered']++;
            elseif ($row['status'] == 4)
                $data_history['cancelled']++;

        echo view("templates/header", $data);
        echo view("pages/history", $data_history);
        echo view("templates/footer");
    }

    public function cancelOrder()
    {
        $request = \Config\Services::request();
        $user_id = session()->has('id') ? session()->get('id') : NULL;
        $order_id = $request->getPost('order_id');

        $order_delivery_model = new OrderDelivery();
        $order_delivery_model
            ->where(['user_id' => $user_id, 'id' => $order_id])
            ->set(['status' => 4])
            ->update();

        return redirect()->route('history');
    }
}
