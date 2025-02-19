<?php
namespace App\Repositories;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ExpenseRepository
{
    protected $model;

    public function __construct(Expense $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $user_id = Auth::user()->id;
        return $this->model->where('user_id',$user_id)->orderBy('amount')->get();
    }

    public function paginate(int $perPage = 10)
    {
        $user_id = Auth::user()->id;
        return $this->model->where('user_id',$user_id)->orderBy('amount')->paginate($perPage);
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
        $expense = $this->findById($id);
        $expense->update($data);
        return $expense;
    }

    public function delete(int $id)
    {
        $expense = $this->findById($id);
        return $expense->delete();
    }
}