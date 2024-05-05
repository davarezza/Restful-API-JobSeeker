<?php

namespace App\Http\Controllers\api;

use App\Models\Society;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'id_card_number' => 'required',
            'password' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'ID Card Number or Password incorrect',
            ], 401);
        }
    
        $society = Society::where('id_card_number', $request->id_card_number)
            ->where('password', $request->password)
            ->first();
    
        if (!$society) {
            return response()->json([
                'message' => 'ID Card Number or Password incorrect',
            ], 401);
        }
    
        $token = $society->createToken('society-token')->plainTextToken;
    
        $society->login_tokens = $token;
        $society->save();
    
        return response()->json([
            'data' => $society,
        ]);
    }

}
