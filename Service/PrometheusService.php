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
   * Render text for metrics output.
   *
   * @return string
   *   The metrics output.
   *
   * @throws \Throwable
   */
  public function metrics(): string
  {
      $renderer = new RenderTextFormat();
      $result = $renderer->render($this->collectorRegistry->getMetricFamilySamples());

      header('Content-type: ' . RenderTextFormat::MIME_TYPE);

      return $result;
  }

  /**
   * Increase a counter.
   *
   * @param array $counter
   *   The counter registration.
   * @param array $labels
   *   The related labels.
   * @param int $count
   *   the count to increase by.
   *
   * @return void
   * @throws \Prometheus\Exception\MetricsRegistrationException
   *
   */
  public function incCounterBy(array $counter, array $labels, int $count = 1): void
  {
      $counter = $this->collectorRegistry->getOrRegisterCounter($counter['name_space'], $counter['name'], $counter['help'], array_keys($labels));
      $counter->incBy($count, array_values($labels));
  }
}