<?php

namespace App\Controllers;

class Coupon extends Home
{
    public function index()
    {
        return $this->cv->pageView('pages/coupon/index', $this->headerInfo);
    }
}
