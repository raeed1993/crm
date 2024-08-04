<?php

namespace App\Http\Controllers;

use App\BL\IServices\IAuthService;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    private IAuthService $service;

    public function __construct(IAuthService $service)
    {
        $this->service = $service;
    }

    public function login(LoginRequest $request)
    {
        $data = $this->service->login($request->validated());
        return oK($data, message: 'login successfully');
    }
}
