<?php
namespace App\Repositories;

use App\Models\Income;
use Illuminate\Support\Facades\Auth;

class IncomeRepository
{
    protected $model;

    public function __construct(Income $model)
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
        $income = $this->findById($id);
        $income->update($data);
        return $income;
    }

    public function delete(int $id)
    {
        $income = $this->findById($id);
        return $income->delete();
    }
}