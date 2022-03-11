<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Notifications\WelcomeEmail;
use App\Notifications\WelcomeEmailNotification;
use App\Services\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(StoreUserRequest $request, UserService $userService)
    {
        $user = $userService->store($request->validated());

        return new UserResource($user);
    }
}
