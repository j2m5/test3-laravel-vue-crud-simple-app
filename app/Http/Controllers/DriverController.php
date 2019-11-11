<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverRequest;
use App\Models\Driver;
use App\Repositories\DriverRepository;
use App\Repositories\VehicleRepository;

class DriverController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    private $driverRepository;
    private $vehicleRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
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
        $drivers = $this->driverRepository->getAll();
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRequest $request)
    {
        $data = $request->input();
        $driver = new Driver($data);
        $driver->save();

        if ($driver) {
            return redirect()->route('drivers.index')->with(['success' => 'Успешно добавлено']);
        } else {
            return back()->withErrors(['message' => 'Произошла ошибка'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = $this->driverRepository->getRow($id);
        $vehicles = $this->driverRepository->getVehiclesByDriver($id);
        return view('drivers.show', compact('driver', 'vehicles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = $this->driverRepository->getRow($id);
        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DriverRequest $request, $id)
    {
        $driver = $this->driverRepository->getRow($id);
        $data = $request->input();
        $result = $driver->fill($data)->save();

        if ($result) {
            return redirect()->route('drivers.index')->with(['success' => 'Успешно изменено']);
        } else {
            return back()->withErrors(['message' => 'Произошла ошибка'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Driver::destroy($id);
        if ($result) {
            return redirect()->route('drivers.index')->with(['success' => 'Успешно удалено']);
        } else {
            return back()->withErrors(['message' => 'Произошла ошибка']);
        }
    }
}
