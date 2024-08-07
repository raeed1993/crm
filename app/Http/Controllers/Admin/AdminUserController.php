<?php

namespace App\Http\Controllers\Admin;

use App\BL\IServices\ICompanyService;
use App\BL\IServices\IUserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Traits\ApiCRUDControllerTrait;

class AdminUserController extends Controller
{
    use ApiCRUDControllerTrait;

    private $store_request = UserStoreRequest::class;
    private $update_request = UserStoreRequest::class;

    public function __construct(IUserService $service)
    {
        $this->service = $service;
    }

}
