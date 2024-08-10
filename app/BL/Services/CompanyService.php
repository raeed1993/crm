<?php

namespace App\BL\Services;

use App\BL\IServices\IAuthService;
use App\BL\IServices\ICompanyService;
use App\BL\UnitOfWorkService;
use App\Models\User;
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

    public function store($data)
    {
        $companyData = [
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'register_number' => $data['register_number'],
            'address' => $data['address'],
            'contract_duration' => $data['contract_duration'],
            'scope' => $data['scope'],
            'contract_type' => $data['contract_type'],
            'status' => $data['status'],
        ];

        $company = $this->connectDB($this->getRepository()->store($companyData));
        $userData = [
            'name' => $data['admin_name'],
            'phone_number' => $data['admin_phone_number'],
            'email' => $data['admin_email'],
            'national_id' => $data['admin_national_id'],
            'company_id' => $company->id,
            'role' => User::$ROLESLABLE['company'],
            'password' => $data['admin_password'],
        ];
        $user = $this->connectDB($this->unitOfWork()->getUserRepository()->store($userData));
        return $company;
    }

}
