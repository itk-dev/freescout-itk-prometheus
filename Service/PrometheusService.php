<?php

namespace Modules\ItkPrometheus\Service;

use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;

class PrometheusService
{
  /**
   * @var \Prometheus\CollectorRegistry
   */
  private CollectorRegistry $collectorRegistry;


  /**
   * @param \Prometheus\CollectorRegistry $registry
   */
  public function __construct (CollectorRegistry $registry)
  {
    $this->collectorRegistry = $registry->getDefault();
  }

  /**
   * @return string
   * @throws \Throwable
   */
  public function metrics(): string
  {
      $renderer = new RenderTextFormat();
      $result = $renderer->render($this->collectorRegistry->getMetricFamilySamples());

      header( 'Content-type: ' . RenderTextFormat::MIME_TYPE );

      return $result;
  }

  /**
   * @throws \Prometheus\Exception\MetricsRegistrationException
   */
  public function incCounterBy($labels, $count = 1): void
  {
    $counter = $this->collectorRegistry->getOrRegisterCounter('orders', 'count', 'Number of Orders', array_keys($labels));
    $counter->incBy($count, array_values($labels));
  }
}