<?php

namespace App\Http\Controllers\Admin;

use App\BL\IServices\ICompanyService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Traits\ApiCRUDControllerTrait;

class AdminCompanyController extends Controller
{
    use ApiCRUDControllerTrait;

    private $store_request = CompanyStoreRequest::class;
    private $update_request = CompanyStoreRequest::class;

    public function __construct(ICompanyService $service)
    {
        $this->service = $service;
    }

    public function companies()
    {
        try {
            return oK($this->service->list());
        } catch (\Exception $exception) {
            return badRequest($exception->getMessage());
        }
    }
}
