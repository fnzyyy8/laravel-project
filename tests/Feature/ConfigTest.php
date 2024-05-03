<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigTest extends TestCase
{
    public function testConfig()
    {
        $firstname = config("contoh.name.firstName");
        $lastname = config("contoh.name.lastName");

        $email =config("contoh.email");

        self::assertEquals($firstname,"Farhan");
        self::assertEquals($email,"farhanshidayat@gmail.com");
        self::assertEquals($lastname,"Septiansyah Hidayat"); // => Tetap berhasil karena membaca dari cache

    }

}
