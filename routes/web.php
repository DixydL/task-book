<?php

use App\Core\Router;

Router::path('/task/index', 'App\Controlers\TaskBookController@index');
Router::path('/task/update', 'App\Controlers\TaskBookController@update');
Router::path('/task/create', 'App\Controlers\TaskBookController@create');
