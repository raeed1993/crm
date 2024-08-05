<?php

namespace App\BL\Services;

use App\BL\IServices\IAuthService;
use App\BL\UnitOfWorkService;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthService extends UnitOfWorkService implements IAuthService
{
    public function login($data)
    {
        $user = $this->connectDB($this->unitOfWork()->getAuthRepository()->findByEmail($data));
        $token = $user->createToken($user->role);
        return [
            'accessToken' => $token->plainTextToken,
            'user' => [
                'about' => '',
                'address' => '',
                'city' => '',
                'country' => '',
                'displayName' => $user->name,
                'email' => $user->email,
                'isPublic' => '',
                'phoneNumber' => $user->phone_number,
                'photoURL' => '',
                'role' => User::$ROLES[$user->role],
                'state' => '',
                'zipCode' => '',
                'id' => $user->id,
            ]
        ];
    }
}
