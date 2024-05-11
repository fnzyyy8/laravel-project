<?php

namespace Tests\Feature;


use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadesTest extends TestCase
{
    public function testConfig()
    {
        $firstname = config('contoh.author.first');
        $secondname = Config::get('contoh.author.first');

        self::assertSame($firstname, $secondname);
    }

    public function testConfigDependency()
    {
        $config = $this->app->make('config');
        $firstname = $config->get('contoh.author.first');
        $secondname = Config::get('contoh.author.first');

        self::assertSame($firstname, $secondname);

    }

    public function testConfigMock()
    {
        Config::shouldReceive('get')
            ->with('contoh.author.first')
            ->andReturn('Farhan Septiansyah');

        $firstname = Config::get('contoh.author.first');

        self::assertSame($firstname,'Farhan Septiansyah');



    }


}
