<?php

namespace Dogpay\Chain;

class Client
{

    private $key;
    private $secret;
    private $timestamp;

    public function __construct($key, $secret){
        $this->key = $key;
        $this->secret = $secret;
        $this->timestamp = $this->getMillisecond();
    }

    /**
     * @return false|string
     */
    public function getMillisecond(){
        list($msec, $sec) = explode(' ', microtime());
        $msectime =  (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return substr($msectime,0,13);
    }

    /**
     * @param $data
     * @return string
     */
    public function sign($data){

        ksort($data);
        $dataArray = [];
        foreach($data as $key => $value){
            $dataArray[] = "{$key}={$value}";
        }
        $dataStr = implode('&', $dataArray);

        return md5($this->secret . $dataStr . $this->timestamp);
    }

    /**
     * @param $url
     * @param $data
     * @return bool|string
     */
    public function post($url, $data){
        $sign = $this->sign($data);
        $header = [
            "key:{$this->key}",
            "sign:{$sign}",
            "Content-Type:application/json",
            "timestamp:{$this->timestamp}",
        ];
        $curl = curl_init(); //初始化
        curl_setopt($curl, CURLOPT_URL,$url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_HEADER,0);
        curl_setopt ($curl, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($curl);
        if (curl_errno($curl)) {
            print curl_error($curl);
        }
        curl_close($curl);

        return $result;
    }
}