<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Advertisements;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function dashboard()
    {
        $posts = Advertisements::all();
        return Inertia::render('User/DashHome',[
            'posts' => $posts
        ]);
    }
}
