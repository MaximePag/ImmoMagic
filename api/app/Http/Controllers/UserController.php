<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;

class UserController extends Controller
{
     /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->lastname = $request->input('lastname');
        $user->firstname = $request->input('firstname');
        $user->phoneNumber = $request->input('phoneNumber');
        $user->mail = $request->input('mail');
        $plainPassword = $request->input('password');
        $user->password = app('hash')->make($plainPassword);
        $user->address = $request->input('address');
        $user->zipCode = $request->input('zipCode');
        $user->city = $request->input('city');


        $user->save();

        return response()->json($user);

    }

    public function archive($id)
    {
        $user = User::find($id);

        $user->archive = true;

        $user->save();

        return response()->json('La fiche client a bien été archivée.');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json('Fiche client bien supprimée');
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    /**
     * Get all User.
     *
     * @return Response
     */
    public function allUsers()
    {
         return response()->json(['users' =>  User::all()], 200);
    }

    /**
     * Get one user.
     *
     * @return Response
     */
    public function singleUser($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }

}
