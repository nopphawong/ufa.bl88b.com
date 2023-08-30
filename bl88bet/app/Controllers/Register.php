<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        // Auth Guard.
        if (session()->logged_in) {
            $url = previous_url();
            return redirect()->to($url);
        }
        return  $this->cv->pageView('pages/register/index', $this->headerInfo);
    }

    public function validatePhoneNumber()
    {
        if ($this->request->isAJAX()) {
            $body = [
                'tel' => $this->request->getVar('username'),
            ];
            return json_encode($body);
            // $service = new APIService();
            // $response = $service->serverService('m_sentotp', POST, $body);
            // $result = json_decode($response);
            // return $response;
        }
    }

    public function verifyBankAccount()
    {
        if ($this->request->isAJAX()) {
            $body = [
                'accno' => trimReplace('-', '', $this->request->getVar('account_number')),
                'bankid' => trimReplace('-', '', $this->request->getVar('financial_id')),
            ];

            $service = new APIService();
            $response = $service->serverService('m_bankverifyx', POST, $body);
            return $response;
        }
    }

    // NOTE: Backup.
    public function submit()
    {
        if ($this->request->isAJAX()) {
            $body = [
                'user' => $this->request->getVar('username'),
                'pass' => $this->request->getVar('password'),
                'name' => $this->request->getVar('account_name'),
                'bankid' => $this->request->getVar('financial_id'),
                'bankno' => $this->request->getVar('account_number'),
                'otpcode' => '123456',
                'otpref' => 'PDFDA'
            ];
            $service = new APIService();
            $response = $service->serverService('m_register', POST, $body);
            return $response;
        }
    }
}
