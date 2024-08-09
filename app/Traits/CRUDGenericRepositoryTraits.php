<?php

namespace App\Traits;


use Illuminate\Database\Eloquent\ModelNotFoundException;


trait CRUDGenericRepositoryTraits
{
    public function index()
    {
        return $this->getModel()->orderBy('id', 'desc')->paginate(20);
    }

    protected function getModel()
    {
        return new $this->model;
    }

    public function store($data)
    {
        return $this->getModel()->create($data);
    }

    public function update($data, $id)
    {
        try {
            $object = $this->find($id);
            $object->update($data);
            return $object;
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage(), 400);
        }

    }

    public function delete($ids)
    {
        return $this->getModel()->destroy([$ids]);
    }

    public function find($id)
    {
        if (null == $object = $this->getModel()->find($id)) {
            throw new ModelNotFoundException("Object not found", 400);
        }

        return $object;
    }

    public function toggleStatus($data)
    {
        $object = $this->find($data['model_id']);
        $object->is_active = !$object->is_active;
        $object->save();
        return $object;
    }

    public function list()
    {
        return $this->getModel()->get()->map(function ($q) {
            return [$q->id => $q->name];
        });
    }
}
