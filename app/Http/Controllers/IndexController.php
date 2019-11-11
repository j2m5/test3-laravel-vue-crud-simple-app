<?php

namespace App\Http\Controllers;

use App\Repositories\VehicleRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    private $vehicleRepository;

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->vehicleRepository = app(VehicleRepository::class);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $vehicles = $this->vehicleRepository->getAll();
        return view('index', compact('vehicles'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $vehicle = $this->vehicleRepository->getRow($id);
        return view('show', compact('vehicle'));
    }
}
