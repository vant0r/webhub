<?php
declare(strict_types=1);
require_once __DIR__ . '/../bootstrap.php';
$user=require_login();
if($_SERVER['REQUEST_METHOD']!=='GET') api_method('GET');
$conversationId=(int)($_GET['conversation_id']??0);
$after=(int)($_GET['after']??0);
if($conversationId<1) json_response(false,null,'conversation_id kerak.',422);
$member=db()->prepare('SELECT 1 FROM conversation_members WHERE conversation_id=? AND user_id=? LIMIT 1');
$member->execute([$conversationId,$user['id']]);
if(!$member->fetch()) json_response(false,null,'Siz bu suhbatga kira olmaysiz.',403);
$stmt=db()->prepare('SELECT m.id,m.uuid,m.type,m.body,m.reply_to_id,m.metadata,m.edited_at,m.created_at,u.id sender_id,u.name sender_name,u.avatar_url sender_avatar FROM messages m JOIN users u ON u.id=m.sender_id WHERE m.conversation_id=? AND m.id>? AND m.deleted_at IS NULL ORDER BY m.id ASC LIMIT 100');
$stmt->execute([$conversationId,$after]);
json_response(true,['messages'=>$stmt->fetchAll()],'Xabarlar.');
