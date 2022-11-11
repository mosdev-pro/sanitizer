<?php

use \Mosdev\Sanitizer\Sanitizer;

it('read pipes config', function () {
    $pipes = config('sanitizer');

    expect(is_array($pipes) && isset($pipes['rules']))->toBeTrue();
});

it('sanitizer - trim', function () {
    $enterValue = ' Hello';
    $needValue = 'Hello';

    $exitValue = (new Sanitizer($enterValue))->sanitize(['trim']);

    expect($exitValue === $needValue)->toBeTrue();
});

it('sanitizer - lower', function () {
    $enterValue = 'Hello';
    $needValue = 'hello';

    $exitValue = (new Sanitizer($enterValue))->sanitize(['lower']);

    expect($exitValue === $needValue)->toBeTrue();
});

it('sanitizer - numeric', function () {
    $enterValue = '01234gf567#\89!';
    $needValue = '0123456789';

    $exitValue = (new Sanitizer($enterValue))->sanitize(['numeric']);

    expect($exitValue === $needValue)->toBeTrue();
});

it('sanitizer - mix', function () {
    $enterValue = ' Alex@mosdev.PrO';
    $needValue = 'alex@mosdev.pro';

    $exitValue = (new Sanitizer($enterValue))->sanitize(['trim', 'lower']);

    expect($exitValue === $needValue)->toBeTrue();
});
