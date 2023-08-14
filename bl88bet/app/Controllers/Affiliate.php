<?php

namespace App\Controllers;

class Affiliate extends BaseController
{
    public function index()
    {
        return $this->cv->pageView('pages/affiliate/index', $this->headerInfo);
    }
}
