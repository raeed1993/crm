<?php

namespace App\Http\Controllers\Admin;

use App\BL\IServices\IAttendanceService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Attendance\AttendanceStoreRequest;
use App\Traits\ApiCRUDControllerTrait;

class AdminAttendanceController extends Controller
{
    use ApiCRUDControllerTrait;

    private $store_request = AttendanceStoreRequest::class;
    private $update_request = AttendanceStoreRequest::class;

    public function __construct(IAttendanceService $service)
    {
        $this->service = $service;
    }
}
