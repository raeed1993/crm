<?php

namespace App\Traits;


use App\DAL\IUnitOfWork;
use Illuminate\Support\Facades\DB;


trait ApiCRUDControllerTrait
{
    private $service = null;

    public function index()
    {
        $list = $this->getService()->index();
        return oK($list);
    }

    public function create()
    {
        return oK('');
    }

    public function show($id)
    {
        $item = $this->getService()->find($id);
        return oK($item);
    }

    public function edit($id)
    {
        $item = $this->getService()->find($id);
        return oK($item);
    }

    public function store()
    {
        try {
            return ok($this->getService()->store($this->getStoreRequest()->validated()), 'created successfully');
        } catch (\Exception $exception) {
            return badRequest(null, $exception->getMessage());
        }
    }

    public function update($id)
    {
        try {
            return oK($this->getService()->update($this->getUpdateRequest()->validated(), $id), 'Update successfully');
        } catch (\Exception $exception) {
            return badRequest(null, $exception->getMessage());
        }
    }

    public function destroy($ids)
    {
        try {
            $this->getService()->delete($ids);
            return oK(null, 'deleted successfully');
        } catch (\Exception $exception) {
            return badRequest(null, $exception->getMessage());

        }
    }

    protected function getService()
    {
        return $this->service;
    }

    protected function getUpdateRequest()
    {
        if (!isset($this->update_request)) {
            return request();
        }

        if (isset($this->update_request['update'])) {
            return resolve($this->update_request['update']);
        }

        return resolve($this->update_request);
    }

    protected function getStoreRequest()
    {
        if (!isset($this->store_request)) {
            return request();
        }

        if (isset($this->store_request['store'])) {
            return resolve($this->store_request['store']);
        }
        return resolve($this->store_request);
    }
}
