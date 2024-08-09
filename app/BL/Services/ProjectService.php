<?php

namespace App\BL\Services;

use App\BL\IServices\IProjectService;
use App\BL\IServices\ITaskService;
use App\BL\UnitOfWorkService;
use App\Traits\CRUDServiceTrait;

class ProjectService extends UnitOfWorkService implements IProjectService
{
    use CRUDServiceTrait;

    private $interface;

    public function __construct()
    {
        $this->interface = $this->unitOfWork()->getProjectRepository();
    }

}
