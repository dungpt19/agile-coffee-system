<?php

namespace App\Models;

use CodeIgniter\Model;

class CoffeeModel extends Model
{
    protected $table = "coffee_list";

    public function getSeasonalCoffee()
    {
        return $this->asArray()->limit(5)->where(['seasonal_special' => 1])->find();
    }

    public function getTop5Popular()
    {
        return $this->asArray()->limit(5)->orderBy('amount_bought ASC')->find();
    }
    public function getCoffeeType()
    {
        return $this->select('coffee_type, count(coffee_type)')->groupBy("coffee_type")->findAll();
    }
    public function getCoffee()
    {
        return $this->findAll();
    }

    public function getSingleCoffee($id = NULL)
    {
        return $this->asArray()
            ->where(['id' => $id])
            ->find();
    }
}
