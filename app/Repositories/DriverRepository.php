<?php


namespace App\Repositories;

use App\Models\Driver;

class DriverRepository extends BaseRepository
{

    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Driver::class;
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

    public function getVehiclesByDriver($id)
    {
        return $this->startQuery()->find($id)->vehicles;
    }
}
