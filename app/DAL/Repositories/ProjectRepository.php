<?php

namespace App\DAL\Repositories;


use App\DAL\IRepositories\IProjectRepository;
use App\Models\Project;
use App\Traits\CRUDGenericRepositoryTraits;

class ProjectRepository implements IProjectRepository
{
    use CRUDGenericRepositoryTraits;

    private $model = Project::class;
}
