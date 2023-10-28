<?php

namespace App\Libraries;

use Exception;

class Portal
{
    private $curl;
    private $secret;
    private $key;

    public function __construct()
    {
        $this->curl = service("curlrequest", ["baseURI" => "https://portal.bl88b.com/api/"]);
        $this->secret = SECRET;
        $this->key = WEB_AGENT;
    }

    // Agent
    public function agent_info($data = array())
    {
        return self::post("agent/info", $data);
    }

    // banner
    public function banner_list($data = array())
    {
        return self::post("banner/list/actived", $data);
    }
    public function banner_info($data = array())
    {
        return self::post("banner/info", $data);
    }

    /* ========================================================================== */

    protected function post($path, $data = array())
    {
        $data = (object) $data;
        $data->secret = $this->secret;
        $data->key = $this->key;
        $body = self::hash_data($data);
        // echo json_encode($data);exit;
        log_message("alert", "path: {$path} :: " . $body);
        $response = $this->curl->post("{$path}", ["json" => $data]);
        $result = self::prepare_result($response);
        log_message("alert", "path: {$path} :: " . json_encode($result));
        return $result;
    }

    protected function get($path)
    {
        $response = $this->curl->get($path);
        return self::prepare_result($response);
    }

    protected function hash_data($array)
    {
        if (!is_array($array)) $array = array();
        return json_encode($array);
    }

    protected function prepare_result($response)
    {
        try {
            $result = json_decode($response->getBody());
            if (json_last_error() !== JSON_ERROR_NONE) {
                return (object) array(
                    "status" => false,
                    "message" => $response->getBody(),
                );
            }
            return $result;
        } catch (Exception $ex) {
            return (object) array(
                "status" => false,
                "message" => $ex->getMessage(),
            );
        }
    }
}
