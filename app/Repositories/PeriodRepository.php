<?php
namespace App\Repositories;

use App\Models\Period;
use Illuminate\Support\Facades\Auth;

class PeriodRepository
{
    protected $model;

    public function __construct(Period $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $user_id = Auth::user()->id;
        return $this->model->where('user_id',$user_id)->orderBy('number_months')->get();
    }

    public function paginate(int $perPage = 10)
    {
        $user_id = Auth::user()->id;
        return $this->model->where('user_id',$user_id)->orderBy('number_months')->paginate($perPage);
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
        $pot = $this->findById($id);
        $pot->update($data);
        return $pot;
    }

    public function delete(int $id)
    {
        $pot = $this->findById($id);
        return $pot->delete();
    }
}