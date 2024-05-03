<?php

namespace App\Data;

class Bar
{

    private Foo $foo;


    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    function bar() : string
    {
        return $this->foo->Foo() . " and Bar";

    }


}