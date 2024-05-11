<?php

namespace Tests\Feature;

use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FooBarSeviceProviderTest extends TestCase
{
    public function testServiceProvider()
    {


        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertSame($foo2,$foo1);


    }

}
