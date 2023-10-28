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
    protected $viewData = [
        "title" => "",
        "description" => "",
        "logo" => "",
        "line_id" => "",
        "line_link" => "",
        "banners" => [],
    ];
    public function pageView($page, $headerInfo, $viewData = [])
    {
        $this->initial_web_info();
        $this->viewData = array_merge($headerInfo, $viewData, $this->viewData);
        $this->viewData['footer'] = view('layouts/footer', $viewData);
        return view('layouts/header', $this->viewData) . view($page, $this->viewData);
    }

    private function initial_web_info()
    {
        $portal = new Portal();
        $info = $portal->agent_info();
        if ($info->status) {
            $this->viewData["title"] = $info->data->name;
            $this->viewData["description"] = $info->data->description;
            $this->viewData["line_id"] = $info->data->line_id;
            $this->viewData["line_link"] = $info->data->line_link;
            $this->viewData["logo"] = $info->data->logo ? $info->data->logo : site_url("assets/images/default/logo_default.png");
        }
        $banners = $portal->banner_list();
        if ($banners->status) $this->viewData["banners"] = $banners->data;
    }
}
