<?php

namespace App\BL\Services;

use App\BL\IServices\ITaskService;
use App\BL\UnitOfWorkService;
use App\Traits\CRUDServiceTrait;

class TaskService extends UnitOfWorkService implements ITaskService
{
    use CRUDServiceTrait;

    private $interface;

    public function __construct()
    {
        $this->interface = $this->unitOfWork()->getTaskRepository();
    }
}
