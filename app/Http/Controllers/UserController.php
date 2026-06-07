<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = DB::table('users')
        ->orderBy('id')
        ->cursorPaginate(4);
//return $users;
        return view('allusers', ['data' => $users]);
    }

    public function singleUser(string $id)
    {
        $user = DB::table('users')
                    ->where('id', $id)
                    ->first();

        return view('user', ['data' => $user]);
    }

    public function addUser(Request $req)
    {
        $user = DB::table('users')->insertGetId([
            'name' => $req->username,
            'email' => $req->useremail,
            'password' => Hash::make('12345678'),
            'age' => $req->userage,
            'city' => $req->usercity,
        ]);

        if ($user) {
            return redirect()->route('home');
        }else{
        return "data not added";

        }

    }
    public function updatePage(string $id){
        //$user = DB::table('users')->where('id',$id)->get();
        $user = DB::table('users')->find($id);

       return view('updateuser',['data'=>$user]);
      // return $user;
    }

    public function updateUser(Request $req, string $id)
{
    $updated = DB::table('users')
        ->where('id', $id)
        ->update([
            'name' => $req->username,
            'email' => $req->useremail,
            'age' => $req->userage,
            'city' => $req->usercity,
        ]);

    if ($updated > 0) {
        return redirect()->route('home');
    }

    return "no changes made or invalid data";
}

    public function deleteUser(string $id)
    {
        $deleted = DB::table('users')
            ->where('id', $id)
            ->delete();

        if ($deleted) {
            return redirect()->route('home');
        }

        return "delete failed";
    }
}