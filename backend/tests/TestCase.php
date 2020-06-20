<?php

namespace Tests;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // protected function setUp(): void
    // {
    //     parent::setUp();
    //     DB::connection()->disableQueryLog();
    //     $this->seed();
    //     Carbon::setTestNow(null);
    // }

}
