<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  App\Models\User;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }


    /**public function index()
    {
        $user = User::all();
        return response()->json($user);
    }*/

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'phoneNumber' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
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
            $user->password = app('hash')->make($request->input('password'));
            $user->adress = $request->input('adress');
            $user->additionnalAdress = $request->input('additionnalAdress');
            $user->zipCode = $request->input('zipCode');
            $user->city = $request->input('city');
            $user->profesionnalNumber = $request->input('profesionnalNumber');
            $user->archive = false;

            $user->save();

            //return successful response
            return response()->json([
                    'entity' => 'user',
                    'action' => 'create',
                    'result' => 'success'
            ], 201);

        } catch (Exception $e) {
            //return error message
            return response()->json([
                'entity' => 'user',
                'action' => 'create',
                'result' => 'failed'
            ], 409);
        }

    }


    /**
     * Get a JWT via given credentials.
     *
     * @param Request $request
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

    /**
     * Get user details.
     *
     * @return Response
     */
    public function me()
    {
        return response()->json(auth()->user());
    }
}
