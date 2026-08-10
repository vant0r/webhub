<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
api_method('POST');
$user=require_login();
$data=request_data();
$name=trim((string)($data['name']??$user['name']));
$phone=trim((string)($data['phone']??($user['phone']??'')));
if(mb_strlen($name)<2||mb_strlen($name)>120) json_response(false,null,'Ism noto‘g‘ri.',422);
$stmt=db()->prepare('UPDATE users SET name=?, phone=? WHERE id=?');
$stmt->execute([$name,$phone!==''?$phone:null,$user['id']]);
json_response(true,['user'=>['id'=>(int)$user['id'],'name'=>$name,'email'=>$user['email'],'phone'=>$phone]],'Profil yangilandi.');
