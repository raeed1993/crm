<?php

namespace App\BL\Services;

use App\BL\IServices\IAuthService;
use App\BL\UnitOfWorkService;
use Illuminate\Support\Facades\DB;

class AuthService extends UnitOfWorkService implements IAuthService
{
    public function login($data)
    {
        $user = $this->connectDB($this->unitOfWork()->getAuthRepository()->findByEmail($data));
        $token = $user->createToken($user->role);
        return [
            'token' => $token->plainTextToken
        ];
    }
}
