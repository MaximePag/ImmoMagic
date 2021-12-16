<?php
namespace App\Http\Controllers;

use App\Models\Extras;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\Request;

class ExtrasController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $extras = Extras::all();
        return response()->json($extras);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $extra = Extras::find($id);
        return response()->json($extra);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function create(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        try {

            $extra = new Extras();

            $extra->name = $request->name;

            $extra->save();

            return response()->json(['extra bien enregistré' => $extra, 'message' => 'extra bien enregistré'], 201);
        } catch (Exception) {
            return response()->json(['message' => 'ERROR'], 409);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $extra = Extras::find($id);

        $extra->name = $request->name;

        $extra->save();

        return response()->json($extra);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        try {
            $extra = Extras::find($id);
            $extra->update(['archived' => true]);

            return response()->json('extra à été archivé', 201);
        } catch (Exception) {
            return response()->json('extra non trouvé', 404);
        }
    }
}
