<?php

namespace App\Controllers;

class Home extends BaseController
{
    // NOTE: Session logged in.
    // "data": {
    //   "userid": "0840476308",
    //   "name": "นาย ณัฐ นพวงค์",
    //   "tel": "0840476308",
    //   "email": "",
    //   "lineid": "0840476308",
    //   "bank": "KBANK-0343740646",
    //   "token": "b97323fc07fd866ee9b9096651e3f4e8",
    //   "web": "BL88",
    //   "webag": "AG059",
    //   "webuser": "FAA0083",
    //   "webpass": "BaXXYy219",
    //   "tovtoday": "0.00",
    //   "tovwid": "0.00",
    //   "tovwiddate": "0000-00-00 00:00:00"
    // }

    public function __construct()
    {
        $body = [
            'user' => session()->data->userid,
            'token' => session()->data->token,
            'web' => session()->data->web,
            'webuser' => session()->data->webuser,
        ];
        // NOTE: Fix new user then set webbalance = 0
        session()->set(['webbalance' => 0]);

        $service = new APIService();
        $response = $service->serverService('m_webbalance', POST, $body);
        $result = json_decode($response);
        if ($result->status) {
            session()->set(['webbalance' => $result->data->webbalance]);
        } else {
            if ($result->msg == 'token หมดอายุ') {
                session()->destroy();
                return redirect()->to('/login');
            }
        }
        // {
        //     "status": true,
        //     "msg": "",
        //     "data": {
        //       "web": "BL88",
        //       "webuser": "FAA0083",
        //       "webbalance": 0
        //     }
        //   }
        $this->viewData['result'] = $result;
    }

    public function index()
    {
        return  $this->cv->pageView('pages/home/index', $this->headerInfo, $this->viewData);
    }

    public function promotionPage()
    {

        return  $this->cv->pageView('pages/promotion/index', $this->headerInfo);
    }

    public function rewardPage()
    {
        return  $this->cv->pageView('pages/reward/index', $this->headerInfo);
    }

    public function refreshCredit()
    {
        if ($this->request->isAJAX()) {
            $body = [
                'user' => session()->data->userid,
                'token' => session()->data->token,
                'web' => session()->data->web,
                'webuser' => session()->data->webuser,
            ];
            $service = new APIService();
            $response = $service->serverService('m_webbalance', POST, $body);
            $result = json_decode($response);
            if ($result->status) {
                session()->set(['webbalance' => $result->data->webbalance]);
            }
            return $response;
        }
    }

    public function setResolutionScreen()
    {
        if ($this->request->isAJAX()) {
            session()->set([
                'screen_width' => $this->request->getVar('width'),
                'screen_height' => $this->request->getVar('height'),
            ]);
        }
    }

    public function playgame()
    {
        if ($this->request->isAJAX()) {
            $body = [
                'user' => session()->data->userid,
                'token' => session()->data->token,
                'web' => session()->data->web,
                'webuser' => session()->data->webuser,
                'webpass' => session()->data->webpass,
                'webgame' => $this->request->getVar('game_code'),
            ];
            $service = new APIService();
            $response = $service->serverService('m_weblogin', POST, $body);

            return $response;
        }
    }

    public function logout()
    {
        session()->destroy();
    }
}
