<?php
require __DIR__.'/../vendor/autoload.php';

use Dogpay\Chain\DogPay;

$key = 'l6qzcjnsxo4hmnod';
$secret = 'a79783c8114eb6a37fc1f04b215a427c47a4b80d5a1d6ac7b3d6db0f66c69e91';
$dogPay = new DogPay($key, $secret);

$open_id = 'project100000';
$chain_id = 2; //

$result = $dogPay->createWallet($open_id, $chain_id);

var_dump($result);