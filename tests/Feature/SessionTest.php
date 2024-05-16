<?php

namespace Tests\Feature;

use Tests\TestCase;

class SessionTest extends TestCase
{
    public function testCreateSession()
    {
        $this->get('/session/create')
            ->assertSeeText('Ok')
            ->assertSessionHas('userId','Farhan')
            ->assertSessionHas('isMember',true);
    }

    public function testGetSession()
    {
        $this->withSession([
            'userId' => 'Farhan',
            'isMember'=>true
        ])->get('/session')
            ->assertStatus(200)
            ->assertJson([
                'userId' => 'Farhan',
                'isMember' => true
            ]);
    }

    public function testGetSessionGuest()
    {
        $this->get('/session')
            ->assertStatus(200)
            ->assertJson([
                'userId' => 'guest',
                'isMember' => false
            ]);

    }


    public function testClearSession()
    {
        $this->get('/session/clear')
            ->assertStatus(200)
            ->assertSeeText("Session in flush");

    }


}
