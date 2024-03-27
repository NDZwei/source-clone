<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:api', 'role:ROLE_ADMIN']], function () {
    $routes = glob(__DIR__ . "/api/admin/*.php");
    foreach ($routes as $route) require($route);
});

Route::group(['middleware' => ['auth:api', 'role:ROLE_PILOT']], function () {
    $routes = glob(__DIR__ . "/api/pilot/*.php");
    foreach ($routes as $route) require($route);
});

Route::group(['middleware' => ['guest:api']], function () {
    $routes = glob(__DIR__ . "/api/public/*.php");
    foreach ($routes as $route) require($route);
});

