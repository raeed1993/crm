<?php

namespace App\Http\Controllers\Admin;

use App\BL\IServices\IProjectService;
use App\BL\IServices\ITaskService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Task\TaskStoreRequest;
use App\Traits\ApiCRUDControllerTrait;

class AdminProjectController extends Controller
{
    use ApiCRUDControllerTrait;

    private $store_request = ProjectStoreRequest::class;
    private $update_request = ProjectStoreRequest::class;

    public function __construct(IProjectService $service)
    {
        $this->service = $service;
    }

    public function projects()
    {
        try {
            return oK($this->service->list());
        } catch (\Exception $exception) {
            return badRequest($exception->getMessage());
        }
    }
}
