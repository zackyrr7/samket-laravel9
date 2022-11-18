<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{


    public function indexUser()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    public function detailUser($id)
    {
        $user = User::find($id);
        return view('user.detail_user',compact('user'));
    }
    public function formUbahBAckend($id)
    {
        $user = User::find($id);
        return view('user.formubah_user',compact('user'));
    }
    public function ubahBackend(Request $request,$id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email= $request->email;
        $user->save();
        return redirect()->route('admin.user.detail',['id'=>$user->id]);
    }

    public function hapusBackend($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.dashboard');
    }

}

