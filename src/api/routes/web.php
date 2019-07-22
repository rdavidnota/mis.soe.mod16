<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('subsidiaries/goal', 'SubsidiaryController@setGoalSubsidiaries');
$router->get('subsidiary/goal', 'SubsidiaryController@getGoalSubsidiary');

$router->get('product_line/goal', 'ProductLineController@get');

$router->post('goal/product_line', 'GoalController@createGoalProductLine');
$router->post('goal/subsidiaries', 'GoalController@createGoalSubsidiaries');

$router->get('goal/status/subsidiary', 'GoalController@getGoalStatusBySellerAndSubsidiary');
$router->get('goal/status/product_line', 'GoalController@getGoalStatusBySellerAndProductLine');
$router->get('goal/status/seller', 'GoalController@getGoalStatusBySeller');
