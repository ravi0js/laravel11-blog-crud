<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailValidationController extends Controller
{
    public function checkEmail(Request $request)
    {
        // $email=$request['email'];
        $email = $request->input('email');
        
        $exists = DB::table('users')->where('email', $email)->exists();
        
        return response()->json([
            'exists' => $exists ? 1 : 0, // 1 if exists, 0 if not
            'message' => $exists ? 'I get your account'  : $email .' is not registered.',
        ]);
    }
}
