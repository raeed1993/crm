<?php

namespace App\BL\Services;

use App\BL\IServices\IAttendanceService;
use App\BL\UnitOfWorkService;
use App\Traits\CRUDServiceTrait;


class AttendanceService extends UnitOfWorkService implements IAttendanceService
{
    use CRUDServiceTrait;

    private $interface;

    public function __construct()
    {
        $this->interface = $this->unitOfWork()->getAttendanceRepository();
    }

    public function store($data)
    {
        foreach ($data as $key => $value) {
            $this->connectDB($this->getRepository()->store($value));
        }

        return $company;
    }

}
