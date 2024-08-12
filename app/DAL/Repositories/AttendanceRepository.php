<?php

namespace App\DAL\Repositories;

use App\DAL\IRepositories\IAttendanceRepository;
use App\Models\Attendance;
use App\Traits\CRUDGenericRepositoryTraits;


class AttendanceRepository implements IAttendanceRepository
{
    use CRUDGenericRepositoryTraits;

    private $model = Attendance::class;
}
