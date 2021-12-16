<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */



    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function register(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'phoneNumber' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'adress' => 'required|string',
            'additionnalAdress' => 'required|string',
            'zipCode' => 'required|string',
            'city' => 'required|string',
            'profesionnalNumber' => 'required|string'
        ]);

        try {

            $user = new User;
            $user->lastname = $request->input('lastname');
            $user->firstname = $request->input('firstname');
            $user->phoneNumber = $request->input('phoneNumber');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);
            $user->adress = $request->input('adress');
            $user->additionnalAdress = $request->input('additionnalAdress');
            $user->zipCode = $request->input('zipCode');
            $user->city = $request->input('city');
            $user->profesionnalNumber = $request->input('profesionnalNumber');
            $user->archive = false;

            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }

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
        $user->email = $request->input('email');
        $plainPassword = $request->input('password');
        $user->password = app('hash')->make($plainPassword);
        $user->adress = $request->input('adress');
        $user->additionnalAdress = $request->input('additionnalAdress');
        $user->zipCode = $request->input('zipCode');
        $user->city = $request->input('city');
        $user->profesionnalNumber = $request->input('profesionnalNumber');


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
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
}