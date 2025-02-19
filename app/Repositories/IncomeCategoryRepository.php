<?php
namespace App\Repositories;

use App\Models\IncomeCategory;
use Illuminate\Support\Facades\Auth;

class IncomeCategoryRepository
{
    protected $model;

    public function __construct(IncomeCategory $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $user_id = Auth::user()->id;
        return $this->model->where('user_id',$user_id)->orderBy('name')->get();
    }

    public function paginate(int $perPage = 10)
    {
        $user_id = Auth::user()->id;
        return $this->model->where('user_id',$user_id)->orderBy('name')->paginate($perPage);
    }

    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        $data['user_id'] = Auth::user()->id;
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $data['user_id'] = Auth::user()->id;
        $incomeCategory = $this->findById($id);
        $incomeCategory->update($data);
        return $incomeCategory;
    }

    public function delete(int $id)
    {
        $incomeCategory = $this->findById($id);
        return $incomeCategory->delete();
    }
}