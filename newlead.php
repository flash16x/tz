<?php
define("TOKEN", "ba67df6a-a17c-476f-8e95-bcdb75ed3958");

function return_data($status, $data = null){
    $result = ['status'=>$status];
    if($data){
        $result['data'] = $data;
    }

    header('Content-Type: application/json');
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit;
}

$fname = $_POST['firstName']??null;
$lname = $_POST['lastName']??null;
$phone = $_POST['phone']??null;
$email = $_POST['email']??null;
if(!$fname || !preg_match('/^[a-zA-Zа-яА-ЯёЁ \-]{2,64}$/', $fname))
    return_data('error', (!$fname) ? 'Укажите имя' : 'Не корректный формат имени');
if(!$lname || !preg_match('/^[a-zA-Zа-яА-ЯёЁ \-]{2,64}$/', $lname))
    return_data('error', (!$fname) ? 'Укажите фамилию' : 'Не корректный формат фамилии');
if(!$phone || !preg_match('/^\+38\s[\(]?0(39|67|68|96|97|98|50|66|95|99|63|73|93|91|92|94)[\)]\s\d{3}[\-]\d{2}[\-]\d{2}$/', $phone))
    return_data('error', (!$fname) ? 'Укажите телефон' : 'Не корректный формат телефона');
$phone = preg_replace('/\D/', '', $phone);
if(!$email || !filter_var($email, FILTER_VALIDATE_EMAIL))
    return_data('error', 'Укажите валидный e-mail');
$ip = $_SERVER['REMOTE_ADDR']??$_SERVER['HTTP_X_FORWARDED_FOR']??$_SERVER['HTTP_CLIENT_IP']??$_SERVER['HTTP_X_CLIENT_IP']??$_SERVER['HTTP_X_CLUSTER_CLIENT_IP']??'0.0.0.0';
$landingUrl = $_SERVER['HTTP_REFERER'];

$send_data = [
    'box_id' => 28,
    'offer_id' => 5,
    'countryCode' => 'GB',
    'language' => 'en',
    'password' => 'qwerty12',
    'ip' => $ip,
    'landingUrl' => $landingUrl,
    'firstName' => $fname,
    'lastName' => $lname,
    'phone' => $phone,
    'email' => $email
];
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => 'https://crm.belmar.pro/api/v1/addlead',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($send_data),
    CURLOPT_HTTPHEADER => [
        'token: '.TOKEN,
        'Content-Type: application/json'
    ],
]);
$response = curl_exec($curl);
try{
    $response = json_decode($response, true);
    if($response['status'] === true)
        return_data('success', $response['id']);
    else
        return_data('error', 'Ошибка отправки лида. Error: "'.$response['error'].'"');
}catch (Exception $e){
    return_data('error', 'Ошибка отправки лида');
}

