<?php

namespace App\Controllers;

use App\Models\CartModel;

class Cart extends BaseController
{
    public function Delete($cartid = "")
    {
        $user_id = session()->has('id') ? session()->get('id') : NULL;
        $cart_model = new CartModel();
        $data["cart_item"] = $cart_model->getUserCart($user_id);
        $cart_model->DeleteItem($cartid);
        return redirect()->to('/order_confirm');
        echo view("templates/header", $data);
        echo view("pages/order_confirm");
        echo view("templates/footer");
    }
}
