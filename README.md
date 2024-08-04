# PHP-DogPay


## Installation

The recommended way to install PHP-DogPay is through [Composer](https://getcomposer.org).

```bash
$ composer require dogpay/chain
```

## Create User

```php

require 'vendor/autoload.php';

use Dogpay\Chain\DogPay;

$key = 'Your Key';
$secret = 'Your Secret';
$dogPay = new DogPay($key, $secret);

$open_id = 'project100003'; //It is recommended to use project name + user unique identifier

$result = $dogPay->createUser($open_id);
```

## Create Waller

```php

require 'vendor/autoload.php';

use Dogpay\Chain\DogPay;

$key = 'Your Key';
$secret = 'Your Secret';
$dogPay = new DogPay($key, $secret);

$open_id = 'project100000'; //It is recommended to use project name + user unique identifier
$chain_id = 2;  //The chain ID can be checked through the table below

$result = $dogPay->createWallet($open_id, $chain_id);
```

## Withdraw

```php

require 'vendor/autoload.php';

use Dogpay\Chain\DogPay;

$key = 'Your Key';
$secret = 'Your Secret';
$dogPay = new DogPay($key, $secret);

$open_id = 'project100000';
$token_id = 4;  //The Token ID can be checked through the table below
$amount = 100;  //Amount of withdrawal
$address = 'TQ33qyLenhYxqMDPtVwdS92UhZwRWdD1VL';    //Withdrawal address
$callback_url = 'https://Your callback address';
$safe_check_code = '202408080808081';   //Security verification code for user withdrawal transactions

$result = $dogPay->withdraw($open_id, $token_id, $amount, $address, $callback_url, $safe_check_code);
```


## 公链ID

| 币名          | 全名称              | 区块链浏览器地址                | 链ID唯一标识 |
| :------------ | :------------------ | :------------------------------ | :----------- |
| eth           | eth                 | https://etherscan.io            | 1            |
| trx           | Tron                | https://tronscan.io             | 2            |
| btc           | btc                 | https://blockchair.com/bitcoin  | 3            |
| sol           | solana              | https://explorer.solana.com     | 4            |
| xrp           | xrp                 | https://xrpscan.com             | 5            |
| eth_optimism  | optimism            | https://optimistic.etherscan.io | 10           |
| bnb           | bnb                 | https://bscscan.com             | 56           |
| matic_polygon | MATIC polygon chain | https://polygonscan.com         | 137          |
| TON           | Toncoin             | https://tonscan.org/            | 15186        |


## Token 类型

| TokenID | Value         | Description                      |
| :------ | :------------ | :------------------------------- |
| 1       | ETH-ETH       | ETH 网络 ETH                     |
| 2       | ETH-USDT      | ETH 网络 USDT                    |
| 3       | TRON-TRX      | TRON 网络 TRX                    |
| 4       | TRON-USDT     | TRON 网络 token：USDT            |
| 5       | BNB-BNB       | BNB Smart Chain 网络 BNB         |
| 6       | BNB-USDT      | BNB Smart Chain 网络 token：USDT |
| 11      | Polygon-MATIC | Polygon 网络 Matic               |
| 12      | Polygon-USDT  | Polygon 网络 token：USDT         |
| 13      | Polygon-USDC  | Polygon 网络 token：USDC         |
| 22      | BNB-USDC      | BNB Smart Chain 网络 token：USDC |
| 23      | BNB-DAI       | BNB Smart Chain 网络 token：DAI  |
| 24      | ETH-USDC      | ETH 网络 USDC                    |
| 25      | ETH-DAI       | ETH 网络 DAI                     |
| 130     | Optimism-ETH  | Optimism 网络 ETH                |
| 131     | Optimism-WLD  | Optimism 网络 token：WLD         |
| 132     | Optimism-USDT | Optimism 网络 token：USDT        |
| 100     | BTC-BTC       | BTC 网络 BTC 主链币              |
| 200     | TON-TON       | TON 网络 TON 主链币              |

