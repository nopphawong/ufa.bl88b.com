<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Commission extends BaseController
{
    public function index()
    {
        return $this->cv->pageView('pages/commission/index', $this->headerInfo);
    }
}
