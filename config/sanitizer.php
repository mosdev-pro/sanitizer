<?php

return [
    'rules' => [
        'trim' => \Mosdev\Sanitizer\Pipelines\Trim::class,
        'numeric' => \Mosdev\Sanitizer\Pipelines\Numeric::class,
        'lower' => \Mosdev\Sanitizer\Pipelines\Lower::class,
        'upper' => \Mosdev\Sanitizer\Pipelines\Upper::class,
    ]
];
