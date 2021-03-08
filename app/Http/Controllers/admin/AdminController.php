<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index(){
    	$admins = Admin::all();

    	return view('admin.index', compact('admins'));
    }
}
