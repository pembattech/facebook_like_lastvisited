<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateLastSection(Request $request)
    {
        $user = auth()->user();
        $user->last_section = $request->input('last_section');
        $user->save();

        return response()->json(['status' => 'success']);
    }
}
