<?php

namespace App\BL\Services;

use App\BL\IServices\IAuthService;
use App\BL\IServices\ICompanyService;
use App\BL\UnitOfWorkService;
use App\Traits\CRUDServiceTrait;
use Illuminate\Support\Facades\DB;

class CompanyService extends UnitOfWorkService implements ICompanyService
{
    use CRUDServiceTrait;

    private $interface;

    public function __construct()
    {
        $this->interface = $this->unitOfWork()->getCompanyRepository();
    }
}
