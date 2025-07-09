<?php
// placeOrder.php

header('Content-Type: application/json');

$serverKey = 'Mid-server-4EJWCckaJFyT0uY9-g1nLX7w'; // Ganti dengan Server Key kamu
$isProduction = false;

$midtransUrl = $isProduction
    ? 'https://app.midtrans.com/snap/v1/transactions'
    : 'https://app.sandbox.midtrans.com/snap/v1/transactions';

$input = json_decode(file_get_contents('php://input'), true);

$transactionDetails = [
    'transaction_details' => [
        'order_id' => uniqid('order-'),
        'gross_amount' => $input['total']
    ],
    'customer_details' => [
        'first_name' => $input['riot_id'],
        'email' => $input['email']
    ],
    'item_details' => [[
        'id' => 'vp-' . rand(1000,9999),
        'price' => $input['price'],
        'quantity' => $input['qty'],
        'name' => $input['item']
    ]]
];

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $midtransUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($transactionDetails),
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Basic ' . base64_encode($serverKey . ':')
    ]
]);

$response = curl_exec($curl);
curl_close($curl);
echo $response;
