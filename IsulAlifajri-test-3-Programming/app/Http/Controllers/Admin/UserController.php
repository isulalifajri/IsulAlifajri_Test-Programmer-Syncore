<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $title = 'Halaman List Users';
        
        $users = User::orderBy('created_at', 'ASC')->paginate(5);
        return view('page.user.user', compact(
            'title', 'users'
        ));

    }

    public function userDetail($id){
        $title = 'Halaman user Detail';
        $user = User::where('id', $id)->first();        
        return view('page.user.user_detail', compact(
            'title', 'user'
        ));
    }
}
