<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MiddlewareTest extends TestCase
{
    public function testValid()
    {

        $this->withHeader('X-API-KEY', 'FSH')
            ->get('/middleware')
            ->assertStatus(200)
            ->assertSeeText('Ok');

    }

    public function testInvalidHeader()
    {
        $this->withHeader('X-API-KEY','FNZ')
            ->get('/middleware')
            ->assertStatus(401)
            ->assertSeeText('Access Denied');

    }


    public function testInvalidNoHeader()
    {

        $this->get('/middleware')
            ->assertSeeText('Access Denied')
        ->assertStatus(401);
    }

    public function testValidGroup()
    {
        $this->withHeader('X-API-KEY','FSH')
            ->get('/middleware/group')
            ->assertSeeText('Group')
            ->assertStatus(200);

    }

    public function testMiddlewareParam()
    {
        $this->withHeader('X-API-KEY','FSH')
            ->get('/middleware/param')
            ->assertStatus(200)
        ->assertSeeText('Pram Middleware');

    }

    public function testWithout()
    {
        $this->withHeader('X-API-KEY','ANI')
            ->get('/middleware/param/without')
            ->assertStatus(200)
        ->assertSeeText('Param Middleware Without');

    }


}
