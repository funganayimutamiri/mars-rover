<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MarsRoverController extends Controller
{
    public function getPhotos(Request $request)
    {
        $rover = $request->query('rover');
        $sol = $request->query('sol', 1000); 
        $apiKey = config('services.nasa.api_key'); 

        $response = Http::get("https://api.nasa.gov/mars-photos/api/v1/rovers/{$rover}/photos", [
            'sol' => $sol,
            'api_key' => $apiKey,
        ]);

        if ($response->successful()) {
            $photos = $response->json()['photos'];
            return response()->json($photos);
        } else {
            return response()->json(['error' => 'Failed to retrieve photos'], $response->status());
        }
    }
}