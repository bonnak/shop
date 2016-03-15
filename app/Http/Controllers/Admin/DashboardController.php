<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends AdminController
{
    public function index()
    {
    	return 'Admin dashboard';
    }

    public function testGuard()
    {
        return 'Test admin guard';
    }
}
