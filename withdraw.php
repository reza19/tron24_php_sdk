<?php
include __DIR__ . '/Tron24.php';

$api_key = '4f3c12fa0a1d1ac8b026298b980f16b2';
$secret_key = 'f7d36fd7f60ab0bac12051e0c3240508585dba741e126669bfbc06e002b9df6ac4e457b6';

$tron24 = new Tron24($api_key,$secret_key);

$coin = $tron24::COIN_TRX; //TRX
$address_id = 1; //from
$to_address = 'TMv9VsAA9qQpQmB9PGcxE7JHusME5Ayzit';
$amount = '0.001';

$res = $tron24->withdraw($coin,$address_id,$to_address,$amount);
print_r($res);

/*
Array
(
    [txid] => 08ae02058de8e24f59a1985f97e2dc73209860f496e53f1e19eff0179a0b1935
    [success] => 1
    [status] => 200
)

----
Array
(
    [errors] => Array
        (
            [amount] => Array
                (
                    [0] => Your balance is low
                )

        )

    [success] =>
    [status] => 422
)



 * */