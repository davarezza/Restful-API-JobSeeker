<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationController extends Controller
{
    public function loginValidator(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'name' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Incorrect Data',
            ], 401);
        }
    
        $validator = Validator::where('user_id', $request->user_id)
            ->where('name', $request->name)
            ->first();
    
        if (!$validator) {
            return response()->json([
                'message' => 'Incrorrect Data',
            ], 401);
        }
    
        $token = $validator->createToken('validator-token')->plainTextToken;
    
        $validator->login_tokens = $token;
        $validator->save();
    
        return response()->json([
            'data' => $validator,
        ]);
    }
}
