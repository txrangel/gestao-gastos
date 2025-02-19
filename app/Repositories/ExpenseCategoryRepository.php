<?php
namespace App\Repositories;

use App\Models\ExpenseCategory;
use Illuminate\Support\Facades\Auth;

class ExpenseCategoryRepository
{
    protected $model;

    public function __construct(ExpenseCategory $model)
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
        $expenseCategory = $this->findById($id);
        $expenseCategory->update($data);
        return $expenseCategory;
    }

    public function delete(int $id)
    {
        $expenseCategory = $this->findById($id);
        return $expenseCategory->delete();
    }
}