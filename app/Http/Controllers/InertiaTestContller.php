<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InertiaTestContller extends Controller
{
    public function index(){
        return Inertia::render(component: 'Inertia/index');
    }
}
