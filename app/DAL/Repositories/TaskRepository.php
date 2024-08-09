<?php

namespace App\DAL\Repositories;


use App\DAL\IRepositories\ITaskRepository;
use App\Models\Task;
use App\Traits\CRUDGenericRepositoryTraits;

class TaskRepository implements ITaskRepository
{
    use CRUDGenericRepositoryTraits;

    private $model = Task::class;
}
