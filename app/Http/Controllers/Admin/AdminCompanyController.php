<?php

namespace App\Http\Controllers\Admin;

use App\BL\IServices\ICompanyService;
use App\Http\Controllers\Controller;
use App\Traits\ApiCRUDControllerTrait;

class AdminCompanyController extends Controller
{
    use ApiCRUDControllerTrait;
    private $store_request = ChoiceRequest::class;
    private $update_request = ChoiceRequest::class;

    public function __construct(ICompanyService $service)
    {
        $this->service = $service;
    }
}
