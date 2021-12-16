<?php
namespace App\Http\Controllers;

use App\Models\Extras;
use Illuminate\Http\JsonResponse;

class ExtrasController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(){
        $extras = Extras::all();
        return response()->json($extras);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id){
        $extras = Extras::find($id);
        return response()->json($extras);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $extras = new Extras();

        $extras->name;

        $extras->save();

        return response()->json('Extra Successfully Created');
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $extras = Extras::find($id);

        $extras->name = $request->name;

        $extras->save();

        return response()->json($extras);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        $extras = Extras::find($id);
        $extras->delete();

        return response()->json ('Extra successsfully deleted');
    }
}
