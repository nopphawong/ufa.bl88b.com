<?php

namespace App\Controllers;

class Slot extends Home
{
    public function index()
    {
        $body = [
            'user' => session()->data->userid,
            'token' => session()->data->token,
            'web' => session()->data->web,
            'webuser' => session()->data->webuser,
            'webpass' => session()->data->webpass,
        ];
        $service = new APIService();
        $response = $service->serverService('m_weblistgame', POST, $body);
        $result = json_decode($response);
        $this->viewData['result'] = $result;
        if (!$result->status)
            return  $this->cv->pageView('pages/slot/index', $this->headerInfo);


        $filteredData = array_filter(
            $result->data,
            function ($obj) {
                return $obj->type == TYPE_SLOT;
            }
        );
        $result->data = $filteredData;
        $this->viewData['result'] = $result;
        return  $this->cv->pageView('pages/slot/index', $this->headerInfo, $this->viewData);
    }
}
