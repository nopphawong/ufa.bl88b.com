<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Language extends BaseController
{
    public function index()
    {
        return $this->cv->pageView('pages/language/index', $this->headerInfo);
    }

    public function change()
    {
        $locale = $this->request->getLocale();
        $this->session->remove('lang');
        $this->session->set('lang', $locale);
        $url = previous_url();
        return redirect()->to($url);
    }
}
