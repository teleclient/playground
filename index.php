<?php

use \danog\MadelineProto\Logger;

if (!\file_exists('madeline.php')) {
    \copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
require 'madeline.php';

if (file_exists('MadelineProto.log')) {unlink('MadelineProto.log');}
$settings['logger']['logger_level'] = Logger::ULTRA_VERBOSE;
$settings['logger']['logger']       = Logger::FILE_LOGGER;
$MadelineProto = new \danog\MadelineProto\API('session.madeline', $settings);
$MadelineProto->start();

$inputChannel = ['_' => 'inputChannel', 'channel_id' => 1423813470, 'access_hash' => 0];
$Updates = $MadelineProto->channels->joinChannel(['channel' => $inputChannel]);
$res = json_encode($updates, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
if ($res == '') {
    $res = var_export($updates, true);
}
$this->echo($res.PHP_EOL);
