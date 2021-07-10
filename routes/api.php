<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'Auth\AuthController@login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('logout', 'Auth\LogOutController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');
    Route::post('preResetPassword', 'Auth\ResetPassController@preResetPassword');
    Route::post('confirmPIN', 'Auth\ResetPassController@confirmPIN');
    Route::post('resetPassword', 'Auth\ResetPassController@resetPassword');

});

Route::group([

    'middleware' => 'api',

], function ($router) {

    /**
     * System API
     */

    Route::apiResource('systems', 'SystemController');

    //systems's quizs
    Route::get('systems/{system_id}/quizs', 'SystemController@quizzes');

    /**
     * Quiz API
     */

    Route::apiResource('quizzes', 'QuizController');

    // //questions of quizs
    // Route::get('quizs/{quiz_id}/questions', 'QuizController');

    // //results of quizs
    // Route::get('quizs/{quiz_id}/results', 'QuizController');

    // //quiz's result of custom user
    // Route::get('quizs/{quiz_id}/results/{user_id}', 'QuizController');

    // /**
    //  * Question API
    //  */

    // Route::apiResource('questions', 'Questionontroller');

    // //answers of questions
    // Route::get('questions/{question_id}/answers', 'QuestionController');

    // //incorrect answer of questions
    // Route::get('questions/{question_id}/incorrectanswer', 'QuestionController');

    // /**
    //  * Answere API
    //  */

    // Route::apiResource('answers', 'AnswerController');

    // /**
    //  * Incorrect Answer API
    //  */

    // Route::apiResource('incorrectanswer', 'IncorrectanswerController');

    // /**
    //  * Reult API
    //  */

    // Route::apiResource('results', 'ResultController');

    // /**
    //  * User API
    //  */

    // Route::apiResource('users', 'UserController');

    // //quizs of users
    // Route::get('users/{user_id}/quizs', 'UserController');

    // //results of users
    // Route::get('users/{user_id}/results', 'UserController');

    // //user's result of custom quiz
    // Route::get('users/{user_id}/result/{quiz_id}', 'UserController');

    
});
