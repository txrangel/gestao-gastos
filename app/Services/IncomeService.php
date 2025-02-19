<?php
namespace App\Services;

use App\Repositories\IncomeRepository;

class IncomeService
{
    protected $repository;

    public function __construct(IncomeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllIncomes()
    {
        return $this->repository->all();
    }

    public function getPaginate(int $perPage = 10)
    {
        return $this->repository->paginate($perPage);
    }

    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}