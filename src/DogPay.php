<?php

namespace Dogpay\Chain;

class DogPay
{

    private $key;
    private $secret;
    private $baseUrl;
    private $client;

    public function __construct($key, $secret, $is_dev = false){
        $this->key = $key;
        $this->secret = $secret;
        $this->baseUrl = $is_dev ? 'https://apipay-test.privatex.io/sdk/' : 'https://vapi.dogpay.ai/sdk/';
        $this->client = new Client($this->key, $this->secret);
    }

    /**
     * @param $open_id
     * @return bool|string
     */
    public function createUser($open_id){
        $data = [
            'OpenId' => $open_id
        ];

        return $this->client->post("{$this->baseUrl}user/create", $data);
    }

    /**
     * @param $open_id
     * @param $chain_id
     * @return bool|string
     */
    public function createWallet($open_id, $chain_id){
        $data = [
            'ChainID' => $chain_id,
            'OpenId' => $open_id,
        ];

        return $this->client->post("{$this->baseUrl}wallet/create", $data);
    }

    /**
     * @param $open_id
     * @param $token_id
     * @param $amount
     * @param $address
     * @param $callback_url
     * @return bool|string
     */
    public function withdraw($open_id, $token_id, $amount, $address, $callback_url, $sn){
        $data = [
            'OpenId' => $open_id,
            'TokenId' => $token_id,
            'Amount' => $amount,
            'AddressTo' => $address,
            'CallBackUrl' => $callback_url,
            'SafeCheckCode' => $sn,
        ];

        return $this->client->post("{$this->baseUrl}partner/UserWithdrawByOpenID", $data);
    }




}