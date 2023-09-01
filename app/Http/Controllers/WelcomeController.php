<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class WelcomeController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('welcome', ['faqs' => $faqs]);
    }
}
