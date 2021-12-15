<?php

namespace App\Http\Controllers;
use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index()
    {
        $documents = Documents::all();

        return response()->json($documents);
    }
    public function show($id)
    {
        $document = Documents::find($id);

        return response()->json($document);
    }
    public function create(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'title' => 'required|string',
            'path' => 'required|string'
        ]);

        $document = new Documents;

        $document->title = $request->title;
        $document->path = $request->path;
        $document->archived = false;

        $document->save();

        return response()->json('gg wp bg');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'path' => 'required|string'
        ]);

        $document = Documents::find($id);

        $document->title = $request->title;
        $document->path = $request->path;

        $document->save();

        return response()->json($document);
    }
    public function delete($id)
    {
        $document = Documents::find($id);

        $document->delete();

        return response()->json('à plus dans l\'bus');
    }
    public function archive($id)
    {
        $document = Documents::find($id);

        $document->archived = true;

        $document->save();

        return response()->json('archiveeed');
    }
}
