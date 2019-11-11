<?php


namespace App\Repositories;

use App\Models\Vehicle;

class VehicleRepository extends BaseRepository
{

    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Vehicle::class;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|mixed[]
     */
    public function getAll()
    {
        return $this->startQuery()->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRow($id)
    {
        return $this->startQuery()->find($id);
    }
}
