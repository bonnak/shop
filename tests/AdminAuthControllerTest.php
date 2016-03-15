<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminAuthControllerTest extends TestCase
{
    /** @test */
    public function it_register_a_backend_user()
    {
    	$this->visit('/admin/register')
        	->type('admin', 'username')
        	->type('admin@info.com', 'email')
        	->type('Admin', 'fullname')
        	->type('123456', 'password')
        	->type('123456', 'password_confirmation')
        	->press('Register')
        	->seeInDatabase('admin_users', [
        		'username' => 'admin',
        		'email' => 'admin@info.com'
        	]);
    }
}
