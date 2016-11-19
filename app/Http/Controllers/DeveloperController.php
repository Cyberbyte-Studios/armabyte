<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DeveloperController extends Controller
{
    public function api(): View
    {
        return view('developer.api');
    }
}
