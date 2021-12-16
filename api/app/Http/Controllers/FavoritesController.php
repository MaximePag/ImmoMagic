<?php

namespace App\Http\Controllers;

use App\Models\Extras;
use App\Models\Favorites;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\Request;

class FavoritesController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $favorites = Favorites::all();
        return response()->json($favorites);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $favorite = Favorites::find($id);
        return response()->json($favorite);
    }
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function create(Request $request): JsonResponse
    {
        $this->validate($request, [
            'timestamp' => 'required|dateTime'
        ]);

        try {

            $favorite = new Favorites();

            $favorite->timestamps = $request->timest;

            $extra->save();

            return response()->json(['extra bien enregistré' => $extra, 'message' => 'extra bien enregistré'], 201);
        } catch (Exception) {
            return response()->json(['message' => 'ERROR'], 409);
        }
    }
}
