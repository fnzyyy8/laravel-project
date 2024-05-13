<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseTest extends TestCase
{
    public function testHeader()
    {
        $this->get('/response/header')
            ->assertStatus(200)
            ->assertHeader('App', 'Belajar-Response')
            ->assertHeader('Author', 'Farhan Septiansyah')
            ->assertHeader('Content-Type', 'application/json')
            ->assertSeeText('Farhan')
            ->assertSeeText('Septiansyah');

    }

    public function testView()
    {
        $this->get('/response/view')
            ->assertSeeText('Hello Farhan');

    }

    public function testJson()
    {
        $this->get('/response/json')
            ->assertJson([
                'first'=>'Farhan',
                'middle'=>'Septiansyah'
            ]);

    }

    public function testFile()
    {
        $this->get('response/file')
            ->assertHeader('Content-Type','image/jpeg');
    }

    public function testDownload()
    {
        $this->get('/response/download')
            ->assertDownload('Farhan dan Aulia.jpg');
    }


}
