<?php
require __DIR__.'/../vendor/autoload.php';

use Dogpay\Chain\DogPay;

$key = 'l6qzcjnsxo4hmnod';
$secret = 'a79783c8114eb6a37fc1f04b215a427c47a4b80d5a1d6ac7b3d6db0f66c69e91';
$dogPay = new DogPay($key, $secret);

$open_id = 'project100000';
$token_id = 4;
$amount = 1;
$address = 'TQ33qyLenhYxqMDPtVwdS92UhZwRWdD1VL';
$callback_url = 'http://15.152.59.250:105/notify_callback.php';
$sn = '202408080808081';

$result = $dogPay->withdraw($open_id, $token_id, $amount, $address, $callback_url, $sn);

var_dump($result);