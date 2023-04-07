<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    use CreatesApplication;

    public function setup(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }
}
