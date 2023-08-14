<?php

namespace App\Controllers;

class Transactions extends Home
{
    // remark  คือ remark ครับ
    // type 
    // 1=ฝาก
    // 2=ถอน
    // 3=เพิ่มโบนัส
    // 4=ลดโบนัส

    // status
    // Y=สำเร็จ
    // C=ยกเลิก
    // R=รอดำเนินการ

    public function index()
    {
        $body = [
            'user' => session()->data->userid,
            'token' => session()->data->token,
            'web' => session()->data->web,
        ];
        $service = new APIService();
        $response = $service->serverService('m_udidwidlists', POST, $body);
        $result = json_decode($response);
        $this->viewData['result'] = $result;
        // print_r($result);
        // exit();

        // [no] => 1 
        // [id] => 36768 
        // [date] => 2023-07-14 22:41:00 
        // [web] => BL88 [userid] => FAA0083 
        // [frombank] => KBANK-0343740646-นาย ณัฐ นพวงค์ 
        // [tobank] => KBANK-0753789766- 
        // [amount] => 10.00 
        // [pamount] => 0.00 
        // [type] => 1 
        // [status] => C 
        // [remark] => ยกเลิกไม่มียอดโอน

        return $this->cv->pageView('pages/transactions_history/index', $this->headerInfo, $this->viewData);
    }

    public function getAll()
    {
        if ($this->request->isAJAX()) {
            $body = [
                'user' => session()->data->userid,
                'token' => session()->data->token,
                'web' => session()->data->web,
            ];
            $service = new APIService();
            $response = $service->serverService('m_udidwidlists', POST, $body);
            return $response;
        }
    }

    public function getDeposit()
    {
        if ($this->request->isAJAX()) {
            $body = [
                'user' => session()->data->userid,
                'token' => session()->data->token,
                'web' => session()->data->web,
            ];
            $service = new APIService();
            $response = $service->serverService('m_udepositlists', POST, $body);
            return $response;
        }
    }

    public function getWithdraw()
    {
        if ($this->request->isAJAX()) {
            $body = [
                'user' => session()->data->userid,
                'token' => session()->data->token,
                'web' => session()->data->web,
            ];
            $service = new APIService();
            $response = $service->serverService('m_uwithdrawlists', POST, $body);
            return $response;
        }
    }
}
