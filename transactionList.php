<?php
include __DIR__ . '/Tron24.php';

$api_key = '4f3c12fa0a1d1ac8b026298b980f16b2';
$secret_key = 'f7d36fd7f60ab0bac12051e0c3240508585dba741e126669bfbc06e002b9df6ac4e457b6';

$tron24 = new Tron24($api_key, $secret_key);


$res = $tron24->transactionList([
    'page' => 1,
    'limit' => 3,
    //'address_id' => 1,
    //'type' => $tron24::TYPE_DEPOSIT,
    //'txid' => '08ae02058de8e24f59a1985f97e2dc73209860f496e53f1e19eff0179a0b1935',
    //'coin' => $tron24::COIN_TRX,
    //'status' => 'SUCCESS'
]);
echo json_encode($res,JSON_PRETTY_PRINT);
//print_r($res);

/*
Array
(
    [items] => Array
        (
            [0] => Array
                (
                    [id] => 6
                    [txid] => 08ae02058de8e24f59a1985f97e2dc73209860f496e53f1e19eff0179a0b1935
                    [blockchain_time] => 1631286099
                    [blockchain_date] => 2021-09-10T15:01:39+0000
                    [fee] => 1.1
                    [fee_coin] => TRX
                    [status] => SUCCESS
                    [owner_address] => TE6xEKThPqnt371cinVPhpnRTYC2Hr4Vwb
                    [amount] => 0.001
                    [to_address] => TMv9VsAA9qQpQmB9PGcxE7JHusME5Ayzit
                    [coin] => TRX
                    [address_id] => 1
                    [address_label] => init
                    [type] => withdraw
                    [block_id] => 33591199
                    [time] => 1631286110
                    [date] => 2021-09-10T15:01:50+0000
                ),
[1] => Array
                (
                    [id] => 2
                    [txid] => 7812cb4cbc0e6d7d17a0ee520eda6e809d4116c24ee0daefd665a3ffed1717d7
                    [blockchain_time] => 1631221458
                    [blockchain_date] => 2021-09-09T21:04:18+0000
                    [fee] => 0
                    [fee_coin] => TRX
                    [status] => SUCCESS
                    [owner_address] => TE6xEKThPqnt371cinVPhpnRTYC2Hr4Vwb
                    [amount] => 1
                    [to_address] => TPcQ4ueun6WRQ28iWqVSByswH1NhyZoEkz
                    [coin] => TRX
                    [address_id] => 1
                    [address_label] => init
                    [type] => withdraw
                    [block_id] => 33569704
                    [time] => 1631221562
                    [date] => 2021-09-09T21:06:02+0000
                )
        )

    [total] => 1
    [limit] => 10
    [page] => 1
    [success] => 1
    [status] => 200
)

 * */