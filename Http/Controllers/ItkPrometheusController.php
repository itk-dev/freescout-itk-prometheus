<?php

namespace Modules\ItkPrometheus\Http\Controllers;

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
   * Provide metrics endpoint.
   *
   * @return string
   *   The metrics data.
   *
   * @throws \Throwable
   */
    public function metrics(): string
    {
      return $this->service->metrics();
    }
}
