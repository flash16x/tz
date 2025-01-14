<?php
define("TOKEN", "ba67df6a-a17c-476f-8e95-bcdb75ed3958");

$fDate = $_POST['dateFrom']??null;
$tDate = $_POST['dateTo']??null;

$data = [
    'page' => 0,
    'limit' => 100
];
if($fDate && preg_match('/^\d{4}\-\d{2}\-\d{2}$/', $fDate)){
    $data['date_from'] = (strtotime($fDate) < strtotime('-60 days'))
        ? date('Y-m-d 00:00:00', strtotime('-60 days'))
        : $fDate.' 00:00:00';
}
if($tDate && preg_match('/^\d{4}\-\d{2}\-\d{2}$/', $tDate)){
    $data['date_to'] = ($fDate && strtotime($fDate) > strtotime($tDate))
        ? $fDate.' 23:59:59'
        : $tDate.' 23:59:59';
}

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => 'https://crm.belmar.pro/api/v1/getstatuses',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => [
        'token: '.TOKEN,
        'Content-Type: application/json'
    ],
]);
$response = curl_exec($curl);
try{
    $response = json_decode($response, true);
    if($response['status'] === true){
        echo json_encode(['data' => $response['data']]);
        exit;
    }
    else{
        echo '{"data":[]}';
        exit;
    }
}catch (Exception $e){
    echo '{"data":[]}';
    exit;
}

