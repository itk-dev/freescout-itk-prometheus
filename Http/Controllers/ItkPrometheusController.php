<?php

namespace Modules\ItkPrometheus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ItkPrometheus\Service\PrometheusService;

class ItkPrometheusController extends Controller
{
    private PrometheusService $service;

    public function __construct(PrometheusService $service)
    {
      $this->service = $service;
    }

  /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('itkprometheus::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('itkprometheus::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('itkprometheus::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('itkprometheus::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    public function metrics(): string
    {
      return $this->service->metrics();
    }
}
