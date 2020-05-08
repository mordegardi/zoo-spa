<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class SpaController
 */
class SpaController extends Controller
{
    public function index()
    {
        if (! auth()->check()) {
            return view('welcome');
        }

        return view('spa');
    }
}
