<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView()
    {
        $this->get('/hello')
            ->assertStatus(200)
            ->assertSeeText("Hello Farhan");

    }

    public function testNestedView()
    {
        $this->get('/world')
            ->assertStatus(200)
            ->assertSeeText('Nested View');

    }
//php artisan view:cache, agar mengcompile file.
//Untuk menghapus view:clear.

    public function testViewNoRoute()
    {
        $this->view('noroute',['data'=>'ini data'])
            ->assertSeeText('ini data');
    }

}
