<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\V1\SignUpRequest;
use App\Http\Resources\v1\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Validator, Auth;

class AuthController extends BaseController
{
    public function signin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('admin-token', ['create', 'read', 'update', 'delete'])->plainTextToken;
            $success['name'] =  $authUser->name;

            return $this->sendResponse($success, 'User signed in');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
    public function signup(SignUpRequest $request)
    {
        $user = User::create($request->all());
        $success['token'] =  $user->createToken('basic-token', ['read'])->plainTextToken;
        $success['user'] =  new UserResource($user);

        return $this->sendResponse($success, 'User created successfully.');
    }
}