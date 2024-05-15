<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncryptTest extends TestCase
{
    public function testEncrypt()
    {
        $encrypt = Crypt::encrypt('Farhan');
        $decrypt = Crypt::decrypt($encrypt);

        var_dump($encrypt);

        self::assertEquals($decrypt,'Farhan');

    }

}
