<?php
namespace App\Repositories;

use App\Models\Pot;
use Illuminate\Support\Facades\Auth;

class PotRepository
{
    protected $model;

    public function __construct(Pot $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $user_id = Auth::user()->id;
        return $this->model->where('user_id',$user_id)->orderBy('limit_percentage')->get();
    }

    public function paginate(int $perPage = 10)
    {
        $user_id = Auth::user()->id;
        return $this->model->where('user_id',$user_id)->orderBy('limit_percentage')->paginate($perPage);
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