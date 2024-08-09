<?php

namespace App\BL\Services;

use App\BL\IServices\IAuthService;
use App\BL\IServices\ICompanyService;
use App\BL\IServices\IUserService;
use App\BL\UnitOfWorkService;
use App\Traits\CRUDServiceTrait;
use Illuminate\Support\Facades\DB;

class UserService extends UnitOfWorkService implements IUserService
{
    use CRUDServiceTrait;

    private $interface;

    public function __construct()
    {
        $this->interface = $this->unitOfWork()->getUserRepository();
    }

}
