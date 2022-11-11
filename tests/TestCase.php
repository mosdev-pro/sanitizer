<?php

namespace Mosdev\Sanitizer\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Mosdev\Sanitizer\SanitizerServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            SanitizerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        /*
        $migration = include __DIR__.'/../database/migrations/create_sanitizer_table.php.stub';
        $migration->up();
        */
    }
}
