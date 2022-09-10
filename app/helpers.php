<?php

use Hidehalo\Nanoid\Client;

function nanoid() {
    $client = new Client();
    return $client->generateId(20, Client::MODE_DYNAMIC);
}