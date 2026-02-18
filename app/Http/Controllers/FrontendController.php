<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Home Page
    public function index() {
        return view('frontend.pages.home');
    }

    // About Page
    public function about() {
        return view('frontend.pages.about');
    }

    // Menu Page (Ekhon static thakbe)
    public function menu() {
        return view('frontend.pages.menu');
    }

    // Contact Page
    public function contact() {
        return view('frontend.pages.contact');
    }
}