<?php

Route::group([
  'middleware' => 'web',
  'prefix' => \Helper::getSubdirectory(),
  'namespace' => 'Modules\ItkPrometheus\Http\Controllers',
], function () {
  Route::get('/metrics', ['uses' => 'ItkPrometheusController@metrics'])
    ->name('itkprometheus.metrics');
});
