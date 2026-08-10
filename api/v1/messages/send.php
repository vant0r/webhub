<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
api_method('POST');
$user=require_login();
$data=request_data();
$conversationId=(int)($data['conversation_id']??0);
$body=trim((string)($data['body']??''));
$replyTo=isset($data['reply_to_id'])?(int)$data['reply_to_id']:null;
if($conversationId<1||$body==='') json_response(false,null,'Suhbat va xabar matni kerak.',422);
if(mb_strlen($body)>10000) json_response(false,null,'Xabar juda uzun.',422);
$member=db()->prepare('SELECT 1 FROM conversation_members WHERE conversation_id=? AND user_id=? LIMIT 1');
$member->execute([$conversationId,$user['id']]);
if(!$member->fetch()) json_response(false,null,'Siz bu suhbatga kira olmaysiz.',403);
$uuid=bin2hex(random_bytes(16));
$stmt=db()->prepare('INSERT INTO messages(uuid,conversation_id,sender_id,type,body,reply_to_id) VALUES(?,?,?,?,?,?)');
$stmt->execute([$uuid,$conversationId,$user['id'],'text',$body,$replyTo]);
json_response(true,['message_id'=>(int)db()->lastInsertId(),'uuid'=>$uuid],'Xabar yuborildi.',201);
