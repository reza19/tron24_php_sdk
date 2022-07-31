<?php
include __DIR__ . '/Tron24.php';

$api_key = '4f3c12fa0a1d1ac8b026298b980f16b2';
$secret_key = 'f7d36fd7f60ab0bac12051e0c3240508585dba741e126669bfbc06e002b9df6ac4e457b6';

$tron24 = new Tron24($api_key,$secret_key);

$address = 'TMv9VsAA9qQpQmB9PGcxE7JHusME5Ayzit';
$res = $tron24->getAddress($address);
print_r($res);

/*
Array
(
    [id] => 2
    [address] => TMv9VsAA9qQpQmB9PGcxE7JHusME5Ayzit
    [label] => Hotwallet-1
    [address_id] => 2
    [date] => 2021-09-10T14:28:29+0000
    [db_balance] => Array
        (
            [TRX] => 0
            [BTT] => 0
            [USDT] => 0
        )

    [success] => 1
    [status] => 200
)

 * */