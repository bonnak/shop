<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminAuthControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_register_a_backend_user()
    {
    	$this->visit('/admin/register')
        	->type('admin', 'username')
        	->type('admin@info.com', 'email')
        	->type('Admin', 'full_name')
        	->type('123456', 'password')
        	->type('123456', 'password_confirmation')
        	->press('Register')
        	->seeInDatabase('admin_users', [
        		'username' => 'admin',
        		'email' => 'admin@info.com'
        	]);
    }

    /** @test */
    public function it_login_a_user()
    {     
        $user = ['username' => 'admin', 'password' => '123456'];
        
        factory('App\AdminUser')->create($user);

        $this->visit('/admin/login')
            ->type($user['username'], 'username')
            ->type($user['password'], 'password')
            ->press('Login')
            ->seePageIs('/admin/dashboard');
    }
}
