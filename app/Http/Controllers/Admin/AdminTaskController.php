<?php

namespace App\Http\Controllers\Admin;

use App\BL\IServices\ITaskService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskStoreRequest;
use App\Traits\ApiCRUDControllerTrait;

class AdminTaskController extends Controller
{
    use ApiCRUDControllerTrait;

    private $store_request = TaskStoreRequest::class;
    private $update_request = TaskStoreRequest::class;

    public function __construct(ITaskService $service)
    {
        $this->service = $service;
    }
}
