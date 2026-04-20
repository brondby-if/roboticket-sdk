<?php

use Brondby\Roboticket\Roboticket;

it('Roboticket connector throws exception when missing configuration', function () {
    $roboticket = new Roboticket([]);
})->throws(Exception::class);

it('Roboticket connector can be instantiated', function () {
    $roboticket = new Roboticket([
        'key' => 'key',
        'client_id' => 'client_id',
        'base_url' => 'base_url',
    ]);

    expect($roboticket->settings->key)->toBe('key');
});
