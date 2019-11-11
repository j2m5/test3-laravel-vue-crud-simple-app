<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use App\Repositories\VehicleRepository;
use App\Repositories\DriverRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    private $vehicleRepository;
    private $driverRepository;

    /**
     * VehicleController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->driverRepository = app(DriverRepository::class);
        $this->vehicleRepository = app(VehicleRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = $this->vehicleRepository->getAll();
        return $vehicles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers =  $this->driverRepository->getAll();
        return $drivers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->all());
        return $vehicle;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = $this->vehicleRepository->getRow($id);
        return $vehicle;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicles = $this->vehicleRepository->getRow($id);
        return $vehicles;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, $id)
    {
        $vehicle = $this->vehicleRepository->getRow($id);
        $vehicle->update($request->all());
        return $vehicle;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehicle::destroy($id);
    }
}
