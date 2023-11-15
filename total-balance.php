<?php
include __DIR__ . '/Tron24.php';

$api_key = '4f3c12fa0a1d1ac8b026298b980f16b2';
$secret_key = 'f7d36fd7f60ab0bac12051e0c3240508585dba741e126669bfbc06e002b9df6ac4e457b6';

$tron24 = new Tron24($api_key, $secret_key);


$res = $tron24->totalBalance();
//echo json_encode($res,JSON_PRETTY_PRINT);
print_r($res);

/*
Array
(
    [result] => Array
        (
            [TRX] => 29.732131
            [USDT] => 325.091
        )

    [success] => 1
    [status] => 200
)

 * */