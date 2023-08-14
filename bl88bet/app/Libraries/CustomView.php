<?php

namespace App\Libraries;

class CustomView
{
    /**
     * This is fuction custom page view (for logged in).
     * @param string $page is view.
     * @param array $headerInfo for config in head element tag such as title.
     * @param array $viewData data in view page.
     */
    public static function pageView($page, $headerInfo, $viewData = [])
    {
        $viewData['footer'] = view('layouts/footer', $viewData);
        return view('layouts/header', $headerInfo) .
            view($page, $viewData);
    }
}
