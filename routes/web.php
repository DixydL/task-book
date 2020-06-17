<?php

use App\Core\Router;

Router::path('/tasks/index', 'App\Controlers\TaskBookController@index');
Router::path('/tasks/update', 'App\Controlers\TaskBookController@update');
Router::path('/tasks/create', 'App\Controlers\TaskBookController@create');
Router::path('/auth', 'App\Controlers\AuthController@index');
