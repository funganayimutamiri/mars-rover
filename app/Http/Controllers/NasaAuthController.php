<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class NasaAuthController extends Controller
{
    public function authenticate()
    {
        $response = Http::post('authentication_api_url', [
            'username' => 'mr.mutamiri@gmail.com',
            'password' => 'xXnFWm7v8EQxRgUfm8OJCcNxFTmFkGygcmgAALUc',
        ]);

        if ($response->successful()) {
            $token = $response->json()['token'];
            return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => 'Authentication failed'], 401);
        }
    }
}

