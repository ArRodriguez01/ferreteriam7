<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
        public function user_can_login()
    {
        $user=[
            'email'=>'test@gmal.com',
            'password'=>'1234'
        ];
        $response=$this->get('/api/login');
        $this->assertAuthenticated($user);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'access_token',
            'token_type',
            'expires_at'
        ]);
    }
}
