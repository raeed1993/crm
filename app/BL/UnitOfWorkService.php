<?php

namespace App\BL;

use App\DAL\IUnitOfWork;
use App\DAL\UnitOfWork;
use Illuminate\Support\Facades\DB;

class UnitOfWorkService
{
    private IUnitOfWork $unitOfWork;

    protected function unitOfWork(): UnitOfWork
    {
        return $this->unitOfWork ??= new UnitOfWork();
    }

    protected function connectDB($fn)
    {
        try {
            DB::beginTransaction();
            $data = $fn;
            DB::commit();
            return $data;
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }
}
