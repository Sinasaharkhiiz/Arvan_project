<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            $u_data = User::find(Auth::id());
            $movies = $u_data->movies()->paginate(5);
            return view('home' ,['movies'=>$movies]);
        }else{
        $movies='notlogin';
        return view('home',['movies'=> $movies]);
        }
    }
    public function show_admin_panel()
    {
        $user_count = User::all()->count();
        $movie_count = Movie::all()->count();
        return view('user.adminPanel' , ['user_count'=> $user_count , 'movie_count'=> $movie_count , ]);

    }
    public function show_users_management()
    {
        if (request('search')) {
            $all_users = User::where('username', 'like', '%' . request('search') . '%')->orWhere('name', 'like', '%' . request('search') . '%')->paginate(9);
        } else {
            $all_users = User::paginate(9);
        }
        return view('user.users_management', ['all_users'=> $all_users]);
    }
    public function show_user_profile()
    {
        $u_data = User::find(Auth::id());
        $m_data = $u_data->movies()->paginate(6);
        return view('user.profile' ,['u_data'=> $u_data , 'm_data'=>$m_data]);
    }
    public function show_user()
    {
     $u_data = User::find($_GET['id']);
     $m_data = $u_data->movies()->paginate(6);
     return view('user.profile' ,['u_data'=> $u_data , 'm_data'=>$m_data]);
    }
}
