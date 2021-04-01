<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Points;

class UserController extends Controller
{

    public function signup(Request $request) {

        if (!$request->isMethod("post")) {
            return view("users/index");
        }

        $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|min:8|max:20',
            'refer' => 'nullable|exists:users,username',
        ]);

        $user = $request->all();
        $user["pid"] = 0;
        $user["points"] = 0;

        if ($user["refer"]) {
            $refer = Users::where("username", $user["refer"])->first();
            $user["pid"] = $refer->id;

            $updated = Points::updateByNewRefer($refer);
            if (!$updated) {
                return redirect('user/signup')->with('status', "some error!");
            }
        }

        $signed = Users::create($user);
        $msg = $signed ? "succeed" : "failed";

        return redirect('user/signup')->with('status', $msg);

    }

}
