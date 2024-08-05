<?php

namespace App\Traits;

trait CRUDServiceTrait
{
    public function index()
    {
        return $this->connectDB($this->getRepository()->index());
    }

    public function find($id)
    {
        return $this->connectDB($this->getRepository()->find($id));
    }

    public function store($data)
    {
        return $this->connectDB($this->getRepository()->store($data));
    }

    public function update($data, $id)
    {
        return $this->connectDB($this->getRepository()->update($data, $id));
    }

    public function destroy($id)
    {
        return $this->connectDB($this->getRepository()->destroy($id));
    }

    protected function getRepository()
    {
        return $this->interface;
    }
}
