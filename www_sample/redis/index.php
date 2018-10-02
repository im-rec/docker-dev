<?php

$redis = new Redis();
$redis->connect('redis');
$redis->set('text', 'hello world');
$value = $redis->get('text');

echo $value;