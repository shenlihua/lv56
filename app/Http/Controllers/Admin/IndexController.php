<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('admin.index.index');
    }


    public function login()
    {
        return view('admin.index.login');
    }


    public function blank()
    {
        return view('admin.index.blank');
    }
    public function flot()
    {
        return view('admin.index.flot');
    }

    public function forms()
    {
        return view('admin.index.forms');
    }

    public function grid()
    {
        return view('admin.index.grid');
    }

    public function icons()
    {
        return view('admin.index.icons');
    }

    public function morris()
    {
        return view('admin.index.morris');
    }

    public function notifications()
    {
        return view('admin.index.notifications');
    }

    public function panelsWells()
    {
        return view('admin.index.panelsWells');
    }

    public function tables()
    {
        return view('admin.index.tables');
    }

    public function typography()
    {
        return view('admin.index.typography');
    }

    public function buttons()
    {
        return view('admin.index.buttons');
    }
}
