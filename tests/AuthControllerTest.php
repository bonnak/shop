<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthControllerTest extends TestCase
{
	use DatabaseTransactions;

    /** @test */
    public function it_register_a_user()
    {
    	$this->visit('/auth/register')
        	->type('Kong', 'surname')
        	->type('Socheat', 'name')
        	->type('seller@info.com', 'email')
        	->type('123456', 'password')
        	->type('123456', 'password_confirmation')
        	->press('Register')
        	->seeInDatabase('users', [
        		'email' => 'seller@info.com'
        	]);
    }

    /** @test */
    // public function user_sign_in()
    // {
    // 	$user = factory('App\User')->create();

    // 	$this->visit('/login')
    // 		->type($user->email, 'email')
    //     	->type('123456', 'password')
    //     	->press('Login')
    //     	->seePageIs('/');
    // }
}
