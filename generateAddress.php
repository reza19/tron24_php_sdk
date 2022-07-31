<?php
include __DIR__ . '/Tron24.php';

$api_key = '4f3c12fa0a1d1ac8b026298b980f16b2';
$secret_key = 'f7d36fd7f60ab0bac12051e0c3240508585dba741e126669bfbc06e002b9df6ac4e457b6';

$tron24 = new Tron24($api_key,$secret_key);

$label = "Hotwallet-1";
$res = $tron24->generateAddress($label);
print_r($res);

/*
 *Array
(
    [address_id] => 2
    [address] => TMv9VsAA9qQpQmB9PGcxE7JHusME5Ayzit
    [label] => Hotwallet-1
    [success] => 1
    [status] => 200
)


 *
 *  Array
(
    [errors] => Array
        (
            [auth] => INVALID_API_KEY
        )

    [success] =>
    [status] => 403
)

 * */