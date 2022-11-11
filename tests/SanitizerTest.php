<?php

use \Mosdev\Sanitizer\Sanitizer;

uses(Sanitizer::class);

it('read pipes config', function () {
    $pipes = config('sanitizer');

    expect(is_array($pipes) && isset($pipes['rules']))->toBeTrue();
});

it('sanitizer - trim', function () {
    $value = (new Sanitizer(' Hello'))->sanitize(['trim']);

    expect($value)->toEqual('Hello');
});

it('sanitizer - lower', function () {
    $value = (new Sanitizer('Hello'))->sanitize(['lower']);

    expect($value)->toEqual('hello');
});

it('sanitizer - upper', function () {
    $value = (new Sanitizer('Hello'))->sanitize(['upper']);

    expect($value)->toEqual('HELLO');
});

it('sanitizer - numeric', function () {
    $value = (new Sanitizer('01234gf567#\89!'))->sanitize(['numeric']);

    expect($value)->toEqual('0123456789');
});

it('sanitizer - mix', function () {
    $value = (new Sanitizer(' Alex@mosdev.PrO'))->sanitize(['trim', 'lower']);

    expect($value)->toEqual('alex@mosdev.pro');
});


it('sanitizer - exception', function () {
    (new Sanitizer(' Alex@mosdev.PrO'))->sanitize(['trim2']);
})->throws(Exception::class);
