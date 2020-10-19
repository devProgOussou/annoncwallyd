<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Inertia\Inertia;
use App\Advertisements;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable|Response
     */
    public function index()
    {
        $users = User::all();
        $user = Auth::user()->name;
        if(Auth::check())
        {
            if (Auth::user()->is_admin === 1) {
                return Inertia::render('Admin/Index', [
                    'users' => $users,
                    'user' => $user,
                ]);
            }

            elseif (Auth::user()->is_register === 1) {
                $advertisements = DB::select("SELECT * FROM advertisements WHERE user_id = ".Auth::id());
                return Inertia::render('User/Index', [
                    'advertisements' => $advertisements,
                    'user' => $user,
                ]);
            }
            else
                return Inertia::render('User/Registration.vue');
        }
    }
    public function user()
    {
        $user = Auth::user()->name;
        return Inertia::render('Shared/Layout', [
            'user' => $user,
        ]);
    }


}
