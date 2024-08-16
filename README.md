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

$config = [
    'key' => 'Your Key',
    'secret' => 'Your Secret',
    'public_key' => 'Your RSA Public Key',
    'private_key' => 'Your RSA Private Key',
    'chain_public_key' => 'Chain RSA Public Key',
];
$dogPay = new DogPay($config);

$open_id = 'project100005';

$result = $dogPay->createUser($open_id);
```

## Create Waller

```php

require 'vendor/autoload.php';

use Dogpay\Chain\DogPay;

$config = [
    'key' => 'Your Key',
    'secret' => 'Your Secret',
    'public_key' => 'Your RSA Public Key',
    'private_key' => 'Your RSA Private Key',
    'chain_public_key' => 'Chain RSA Public Key',
];
$dogPay = new DogPay($config);

$open_id = 'project100000'; //It is recommended to use project name + user unique identifier
$chain_id = 2;  //The Chain ID can be checked through the table below

$result = $dogPay->createWallet($open_id, $chain_id);
```

## Withdraw

```php

require 'vendor/autoload.php';

use Dogpay\Chain\DogPay;

$config = [
    'key' => 'Your Key',
    'secret' => 'Your Secret',
    'public_key' => 'Your RSA Public Key',
    'private_key' => 'Your RSA Private Key',
    'chain_public_key' => 'Chain RSA Public Key',
];
$dogPay = new DogPay($config);

$open_id = 'project100000';
$token_id = 4;  //The Token ID can be checked through the table below
$amount = 100;  //Amount of withdrawal
$address = 'TQ33qyLenhYxqMDPtVwdS92UhZwRWdD1VL';    //Withdrawal address
$callback_url = 'https://Your callback address';
$safe_check_code = '202408080808081';   //Security verification code for user withdrawal transactions

$result = $dogPay->withdraw($open_id, $token_id, $amount, $address, $callback_url, $safe_check_code);
```


## Chain ID

| Coin Name          | Full name              | Blockchain browser address                | Chain ID    |
| :------------ | :------------------ | :------------------------------ |:------------|
| eth           | eth                 | https://etherscan.io            | 1           |
| trx           | Tron                | https://tronscan.io             | 2           |
| btc           | btc                 | https://blockchair.com/bitcoin  | 3           |
| sol           | solana              | https://explorer.solana.com     | 4           |
| xrp           | xrp                 | https://xrpscan.com             | 5           |
| eth_optimism  | optimism            | https://optimistic.etherscan.io | 10          |
| bnb           | bnb                 | https://bscscan.com             | 56          |
| matic_polygon | MATIC polygon chain | https://polygonscan.com         | 137         |
| TON           | Toncoin             | https://tonscan.org/            | 15186       |


## Token ID

| TokenID | Value         | Description                      |
| :------ | :------------ | :------------------------------- |
| 1       | ETH-ETH       | ETH Network ETH                     |
| 2       | ETH-USDT      | ETH Network USDT                    |
| 3       | TRON-TRX      | TRON Network TRX                    |
| 4       | TRON-USDT     | TRON Network token：USDT            |
| 5       | BNB-BNB       | BNB Smart Chain Network BNB         |
| 6       | BNB-USDT      | BNB Smart Chain Network token：USDT |
| 11      | Polygon-MATIC | Polygon Network Matic               |
| 12      | Polygon-USDT  | Polygon Network token：USDT         |
| 13      | Polygon-USDC  | Polygon Network token：USDC         |
| 22      | BNB-USDC      | BNB Smart Chain Network token：USDC |
| 23      | BNB-DAI       | BNB Smart Chain Network token：DAI  |
| 24      | ETH-USDC      | ETH Network USDC                    |
| 25      | ETH-DAI       | ETH Network DAI                     |
| 130     | Optimism-ETH  | Optimism Network ETH                |
| 131     | Optimism-WLD  | Optimism Network token：WLD         |
| 132     | Optimism-USDT | Optimism Network token：USDT        |
| 100     | BTC-BTC       | BTC Network BTC 主链币              |
| 200     | TON-TON       | TON Network TON 主链币              |

