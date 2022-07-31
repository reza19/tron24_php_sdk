<?php
/**
 * *
 * User: Tron24.top
 * Date: 8/9/2021
 * Time: 2:08 PM
 */

class Tron24
{
    private $api_key, $secret_key;
    private $base_api = 'https://tron24.top/api/';

    const TYPE_DEPOSIT = 'deposit';
    const TYPE_WITHDRAW = 'withdraw';

    const COIN_TRX = 'TRX';
    const COIN_USDT = 'USDT';
    const COIN_BTT = 'BTT';

    /**
     * Tron24 constructor.
     * @param $api_key
     * @param $secret_key
     */
    public function __construct($api_key, $secret_key)
    {
        $this->api_key = $api_key;
        $this->secret_key = $secret_key;
    }

    /**
     * @param string $label
     * @return mixed
     */
    public function generateAddress($label = '')
    {
        $label = substr($label, 0, 250);
        return $this->send('generate-address', ['label' => $label]);
    }

    /**
     * @param int $address_id
     * @return mixed
     */
    public function getAddressById(int $address_id)
    {
        return $this->send('get-address-by-id', ['address_id' => $address_id]);
    }

    /**
     * @param string $address
     * @return mixed
     */
    public function getAddress(string $address)
    {
        return $this->send('get-address', ['address' => $address]);
    }

    /**
     * @param string $label
     * @return mixed
     */
    public function getAddressListByLabel(string $label)
    {
        return $this->send('get-address-list-by-label', ['label' => $label]);
    }

    /**
     * @param int $page
     * @param int $limit
     * @return mixed
     */
    public function getAddressList(int $page=1 , int $limit = 10)
    {
        return $this->send('address-list', ['page' => $page,'limit'=>$limit]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function transactionList(array $data=[])
    {
        return $this->send('transaction-list', $data);
    }

    /**
     * @param string $coin
     * @param int $address_id
     * @param string $to_address
     * @param $amount
     * @return mixed
     */
    public function withdraw(string $coin , int $address_id , string $to_address , $amount)
    {
        return $this->send('withdraw', [
            'coin'=>$coin ,
            'address_id' =>$address_id ,
            'to_address'=>$to_address ,
            'amount'=>$amount
        ]);
    }


    /**
     * @param $api
     * @param array $data
     * @return mixed
     */
    private function send($api, $data = [])
    {
        $post_encode = http_build_query($data);
        $api_sign = base64_encode(hash_hmac('sha256', $post_encode, $this->secret_key, true));
        $headers = [
            'api_key' => $this->api_key,
            'api_sign' => $api_sign
        ];
        $result = $this->requestPost($this->base_api . $api, $data, $headers, 20);
        return json_decode($result, true);
    }

    /**
     * @param $url
     * @param $data
     * @param array $headers
     * @param bool $timeout
     * @return mixed
     */
    private function requestPost($url, $data, $headers = [], $timeout = false)
    {
        $fields = [];

        foreach ($data as $k => $v)
            $fields[$k] = urlencode($v);

        $fields_string = "";
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }

        rtrim($fields_string, '&');

        //headers
        $_headers = [];
        foreach ($headers as $_k => $_v) {
            $_headers[] = "{$_k}: {$_v}";
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $_headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        if ($timeout) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        }

        $result = curl_exec($ch);

        curl_close($ch);
        return $result;
    }
}