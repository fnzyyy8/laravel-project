<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputTest extends TestCase
{
    public function testInput()
    {
        $this->post('/input-type', [
            'name' => 'Farhan',
            'married' => true,
            'birthdate' => '1998-9-4'
        ])
            ->assertSeeText('Farhan')
            ->assertSeeText(true)
            ->assertSeeText('1998-9-4');

    }

    public function testFilterInput()
    {
        $this->post('/filter-only', [
            'name' => [
                'first' => 'Farhan',
                'last' => 'Septiansyah'
            ]
        ])->assertSeeText('Farhan')
            ->assertSeeText('Septiansyah');

        $this->post('/filter-except', [
            'name' => [
                'first' => 'Farhan',
                'last' => 'Septiansyah'
            ]
        ])->assertSeeText('Farhan')
            ->assertDontSeeText('Septiansyah');

    }

}
