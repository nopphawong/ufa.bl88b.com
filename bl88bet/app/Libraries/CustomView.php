<?php

namespace App\Libraries;

use App\Libraries\Portal;

class CustomView
{
    /**
     * This is fuction custom page view (for logged in).
     * @param string $page is view.
     * @param array $headerInfo for config in head element tag such as title.
     * @param array $viewData data in view page.
     */
    public function pageView($page, $headerInfo, $viewData = [])
    {
        $web =  $this->get_web_info();
        $viewData["logo"] = $web->logo;
        $viewData["banners"] = $web->banners;
        $headerInfo["logo"] = $web->logo;
        $headerInfo["banners"] = $web->banners;
        $viewData['footer'] = view('layouts/footer', $viewData);
        return view('layouts/header', $headerInfo) .
            view($page, $viewData);
    }

    private function get_web_info()
    {
        $portal = new Portal();
        $result = (object) array(
            "logo" => site_url("assets/images/default/logo_default.png"),
            "banners" => [],
        );
        $info = $portal->agent_info();
        if ($info->status) $result->logo = $info->data->logo ? $info->data->logo : site_url("assets/images/default/logo_default.png");

        $banners = $portal->banner_list();
        if ($banners->status) $result->banners = $banners->data;

        return $result;
    }
}
