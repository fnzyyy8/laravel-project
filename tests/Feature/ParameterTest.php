<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParameterTest extends TestCase
{
    public function testParam()
    {
        $this->get("/product/2")
            ->assertSeeText("This is Product - 2");

        $this->get("/product/7")
            ->assertSeeText("This is Product - 7");

    }

    public function testDubleParam()
    {
        $this->get("/product/1/item/1")
            ->assertStatus(200)
            ->assertSeeText("This is Product - 1, with number 1");

    }

    public function testOptionalParam()
    {
        $this->get('/user/Farhan')
            ->assertSeeText("User Farhan");

        $this->get('user/')
            ->assertSeeText('User 404');
    }

    public function testNamed()
    {
    $this->get('/redirect')->assertRedirect('/world');
    }


}
