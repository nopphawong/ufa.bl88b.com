<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PlayGame extends BaseController
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
            return  $this->cv->pageView('pages/play_game/index', $this->headerInfo);

        $filteredCasino = array_filter(
            $result->data,
            function ($obj) {
                return $obj->type == TYPE_CASINO;
            }
        );

        $filteredSlot = array_filter(
            $result->data,
            function ($obj) {
                return $obj->type == TYPE_SLOT;
            }
        );

        $filteredSport = array_filter(
            $result->data,
            function ($obj) {
                return $obj->type == TYPE_SPORT;
            }
        );

        $result->casino = $filteredCasino;
        $result->slot = $filteredSlot;
        $result->sport = $filteredSport;
        unset($result->data);
        // print_r($result);
        $this->viewData['result'] = $result;
        return $this->cv->pageView('pages/play_game/index', $this->headerInfo, $this->viewData);
    }
}
