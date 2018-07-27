<?php
require 'vendor/autoload.php';

use Monetizze\Token;

$token = new Token('123456');
$token = $token->getToken();
echo '<pre>';
var_dump($token);


$url = "https://api.monetizze.com.br/2.1/transactions";
$dados = [ 
  'product' => '1234',
  'transaction' => '1234',
  'date_min'		=> '2016-01-01 00:00:01',
  'date_max'		=> '2016-03-31 23:59:59',
  'status[]'		=> '1',
  'status[]'		=> '3',
  'forma_pagamento[]'   => '1',
  'forma_pagamento[]'   => '2',
  'page'   => '1',
];

$ch = curl_init();
 $dados = http_build_query($dados);
 $url .= '?'. $dados;
 curl_setopt($ch, CURLOPT_URL, $url); 
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_HTTPHEADER, ["TOKEN:".$token]);  
  
 $res = curl_exec($ch);

 $dados = json_decode($res);
var_dump($dados);