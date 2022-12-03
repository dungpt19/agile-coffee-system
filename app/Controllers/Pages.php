<?php

namespace App\Controllers;

use App\Models\CoffeeModel;
use App\Models\CartModel;
use App\Models\Accountmodel;

class Pages extends BaseController
{
    public function index()
    {
        $user_id = session()->has('id') ? session()->get('id') : NULL;
        $model = new CoffeeModel();
        $cart_model = new CartModel();
        $data["cart_item"] = $cart_model->getUserCart($user_id);
        $data["seasonal_coffee"] = $model->getSeasonalCoffee();
        $data["top_5_popular"] = $model->getTop5Popular();
        echo view("templates/header", $data);
        echo view("pages/home");
        echo view("templates/footer");
    }
    public function showme($page = "")
    {
        $user_id = session()->has('id') ? session()->get('id') : NULL;
        $model = new CoffeeModel();
        $cart_model = new CartModel();
        $account_model = new Accountmodel();
        $data["account_info"] = $account_model->getUser($user_id);
        $data["coffee_type"] = $model->getCoffeeType();
        $data["coffees"] = $model->getCoffee();
        $data["cart_item"] = $cart_model->getUserCart($user_id);
        echo view("templates/header", $data);
        echo view("pages/$page");
        echo view("templates/footer");
    }
}
