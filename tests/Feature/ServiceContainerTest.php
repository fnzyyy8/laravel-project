<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloServiceIndonesia;
use App\Services\HelloServices;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function PHPUnit\Framework\assertSame;

class ServiceContainerTest extends TestCase
{
    public function testDependency()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals($foo1->foo(),"Foo");
        self::assertEquals($foo2->foo(),"Foo");
        self::assertNotSame($foo1,$foo2);

    }

    public function testBind()
    {
        $this->app->bind(Person::class,function ($app){
            return new Person("Farhan","Septianbsyah");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals($person1->firstname,"Farhan"); // Closure() / new Person("Farhan","Septiansyah")
        self::assertEquals($person2->firstname,"Farhan"); // Closure() / new Person("Farhan","Septiansyah")
        self::assertNotSame($person1,$person2);

    }
    public function testSigleton()
    {
        $this->app->singleton(Person::class,function ($app){
            return new Person("Farhan","Septianbsyah");
        });

        $person1 = $this->app->make(Person::class); // Closure() / new Person("Farhan","Septiansyah"), if not exist
        $person2 = $this->app->make(Person::class); // return existing

        self::assertEquals($person1->firstname,"Farhan");
        self::assertEquals($person2->firstname,"Farhan");
        self::assertSame($person1,$person2);

    }

    public function testInstance()
    {

        $person = new Person("Farhan", "Septiansyah");
        $this->app->instance(Person::class,$person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals($person2->firstname,"Farhan");
        self::assertSame($person,$person1);
        self::assertSame($person1,$person2);

    }

    public function testDependencyInjection()
    {
        $this->app->singleton(Foo::class,function ($app){
            return new Foo();
        });

        $this->app->singleton(Bar::class,function ($app){
            return new Bar($app->make(Foo::class));
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($foo,$bar1->foo);
        self::assertSame($bar1,$bar2);

    }

    public function testInterfaceToClass()
    {

        $this->app->singleton(HelloServices::class,function ($app){
            return new HelloServiceIndonesia();
        });

        $helloService = $this->app->make(HelloServices::class);

        self::assertEquals("Hello Farhan",$helloService->hello("Farhan"));

    }


}
