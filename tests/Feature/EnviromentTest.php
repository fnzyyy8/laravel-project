<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class EnviromentTest extends TestCase
{
    public function testGetEnv()
    {
        $youtube = env("YOUTUBE");

        self::assertEquals("Farhan",$youtube);
    }

    public function testDeafultValue()
    {
        $author = env("AUTHOR","Farhan Septiansyah Hidayat");

        self::assertEquals("Farhan Septiansyah Hidayat",$author);

    }


}
