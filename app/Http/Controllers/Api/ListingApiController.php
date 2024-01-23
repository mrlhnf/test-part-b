<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;

class ListingApiController extends Controller
{
    public function getListing(Request $request)
    {
        $user = $request->user();

        $listings = Listing::where('user_id', $user->id)->get();

        $data = [];

        foreach ($listings as $x) {
            $data[] = [
                'id' => $x->id,
                'name' => $x->name,
                'latitude' => $x->latitude,
                'longitude' => $x->longitude,
                'created_at' => $x->created_at->toDateTimeString(),
                'updated_at' => $x->updated_at->toDateTimeString(),
            ];
        }

        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'result' => [
                'current_page' => 1,
                'data' => $data,
            ],
        ], 200, [], JSON_PRETTY_PRINT);
    }
}
