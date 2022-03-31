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
            'mail' => 'required|email|unique:g5e1D_users',
            'password' => 'required|string',
            'address' => 'required|string',
            'zipCode' => 'required|string',
            'city' => 'required|string'
        ]);

        try {

            $user = new User;
            $user->lastname = $request->input('lastname');
            $user->firstname = $request->input('firstname');
            $user->phoneNumber = $request->input('phoneNumber');
            $user->mail = $request->input('mail');
            $user->password = app('hash')->make($request->input('password'));
            $user->address = $request->input('address');
            $user->zipCode = $request->input('zipCode');
            $user->city = $request->input('city');
            $user->id_g5e1D_roles = 1;
            $user->archive = false;

            $user->save();

            return response()->json(['API_response' => 'Enregistrement effectue'], 201);

        } catch (Exception $e) {
            return response()->json(['API_response' => 'Enregistrement Impossible'], 409);
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
            'mail' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['mail', 'password']);

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
