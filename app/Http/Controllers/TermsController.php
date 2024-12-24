<?php

// app/Http/Controllers/TermsController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    // This method returns the terms view
    public function index()
    {
        return view('terms');  // Make sure you create a 'terms.blade.php' view
    }
}

