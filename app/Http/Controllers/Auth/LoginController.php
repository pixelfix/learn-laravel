<?php

namespace App\Http\Controllers\Auth;

use Firebase\JWT\JWT;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            return response(['Incorrect username or password'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = Auth::user();

        $decryptedToken = $user->createToken($user->id)->plainTextToken;
        $encryptedToken = Crypt::encrypt($decryptedToken);

        $jwt = JWT::encode([$encryptedToken], config('app.key'), 'HS256');

        $cookie = cookie('jwt', $jwt);

        return response([$jwt])->withCookie($cookie);
    }
}
