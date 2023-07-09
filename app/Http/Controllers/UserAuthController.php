<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;

class UserAuthController extends Controller
{
    public function showLogin($guard)
    {
        return response()->view('cms.auth.login', compact('guard'));
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'gmail' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'gmail' => $request->get('gmail'),
            'password' => $request->get('password'),
        ];

        if (!$validator->fails()) {
            $errors = $validator->getMessageBag()->all();

            if (Auth::guard($request->get('guard'))->attempt($credentials)) {
                return response()->json(['icon' => 'success', 'title' => 'Login is Successful'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Login Failed'], 400);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }

    public function logout(Request $request)
    {
        $guard = auth()->getDefaultDriver();
        Auth::guard($guard)->logout();
        $request->session()->invalidate();

        if ($guard === 'admin') {
            return redirect()->route('login', 'admin');
        } elseif ($guard === 'author') {
            return redirect()->route('login', 'author');
        }
    }


}
