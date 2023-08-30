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
            'web' => session()->data->web,
            'webuser' => session()->data->webuser,
        ];
        $service = new APIService();
        $response = $service->serverService('m_ididwidlists', POST, $body);
        $result = json_decode($response);
        $this->viewData['result'] = $result;
        // print_r($result);
        // exit;

        // [no] => 1 
        // [date] => 2023-08-30 17:02:00 
        // [web] => UFA 
        // [userid] => UFTW330001 
        // [frombank] => - 
        // [tobank] => KBANK-0131301839000 
        // [amount] => 100.00 
        // [proamount] => 0.00 
        // [type] => ถอน 
        // [status] => R 
        // [remark] => กำลังดำเนินการ

        // [no] => 2 
        // [date] => 2023-08-30 16:50:00 
        // [web] => UFA 
        // [userid] => UFTW330001 
        // [frombank] => KBANK-0131301839000 
        // [tobank] => KBANK-0753789766 
        // [amount] => 100.00 
        // [proamount] => 0.00 
        // [type] => ฝาก 
        // [status] => R 
        // [remark] => กำลังดำเนินการ 

        // [no] => 3
        // [date] => 2023-08-30 16:19:00 
        // [web] => UFA 
        // [userid] => UFTW330001 
        // [frombank] => KBANK-0131301839000 
        // [tobank] => KBANK-0753789766 
        // [amount] => 10.00 
        // [proamount] => 0.00 
        // [type] => ฝาก 
        // [status] => Y 
        // [remark] => สำเร็จ


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
                'web' => session()->data->web,
                'webuser' => session()->data->webuser,
            ];
            $service = new APIService();
            $response = $service->serverService('m_ididwidlists', POST, $body);
            return $response;
        }
    }

    public function getDeposit()
    {
        if ($this->request->isAJAX()) {
            $body = [
                'web' => session()->data->web,
                'webuser' => session()->data->webuser,
            ];
            $service = new APIService();
            $response = $service->serverService('m_ididwidlists', POST, $body);
            return $response;
        }
    }

    public function getWithdraw()
    {
        if ($this->request->isAJAX()) {
            $body = [
                'web' => session()->data->web,
                'webuser' => session()->data->webuser,
            ];
            $service = new APIService();
            $response = $service->serverService('m_ididwidlists', POST, $body);
            return $response;
        }
    }
}
