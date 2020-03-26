<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['namespace' => 'Auth'], function () {

    Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'ResetPasswordController@showResetForm']);
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'ResetPasswordController@reset']);
    Route::get('register', ['as' => 'register', 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'RegisterController@register']);


});

Route::group(['namespace' => 'Web'], function () {


    Route::get('/secure/config/migrate-refresh', ['uses' => 'ConfigController@migrateRefresh']);
    Route::get('/secure/config/migrate', ['uses' => 'ConfigController@migrate']);
    Route::get('/secure/config/db-seed', ['uses' => 'ConfigController@dbSeed']);
    Route::get('/secure/config/clear-autoload', ['uses' => 'ConfigController@clearAutoLoad']);
    Route::get('/secure/config/config-cache', ['uses' => 'ConfigController@configCache']);
    Route::get('/secure/config/key-generate', ['uses' => 'ConfigController@keyGenerate']);
    Route::get('/secure/config/optimize', ['uses' => 'ConfigController@optimize']);

    Route::get('/', ['uses' => 'FrontController@index', 'as' => 'index']);
    Route::get('/services', ['uses' => 'FrontController@services', 'as' => 'services']);
    Route::get('/about', ['uses' => 'FrontController@about', 'as' => 'about']);
    Route::get('/contact', ['uses' => 'FrontController@contact', 'as' => 'contact']);
    Route::get('/team', ['uses' => 'FrontController@team', 'as' => 'team']);

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home']);


        Route::group(['middleware' => ['ROLE_OR:' . \App\Models\System\Role::ROLE_ADMIN]], function () {

            Route::get('/users/list', ['uses' => 'UserController@index', 'as' => 'users.index']);
            Route::get('/users/{id}/edit', ['uses' => 'UserController@edit', 'as' => 'users.edit'])->where('id', '[0-9]+');
            Route::post('/users/{id}/update', ['uses' => 'UserController@update', 'as' => 'users.update'])->where('id', '[0-9]+');
            Route::get('/users/create', ['uses' => 'UserController@create', 'as' => 'users.create']);
            Route::post('/users/store', ['uses' => 'UserController@store', 'as' => 'users.store']);

            Route::get('/courses/list', ['uses' => 'CourseController@index', 'as' => 'courses.index']);
            Route::get('/courses/{id}/edit', ['uses' => 'CourseController@edit', 'as' => 'courses.edit'])->where('id', '[0-9]+');
            Route::post('/courses/{id}/update', ['uses' => 'CourseController@update', 'as' => 'courses.update'])->where('id', '[0-9]+');
            Route::get('/courses/create', ['uses' => 'CourseController@create', 'as' => 'courses.create']);
            Route::post('/courses/store', ['uses' => 'CourseController@store', 'as' => 'courses.store']);
            Route::post('/courses/delete/{id}', ['uses' => 'CourseController@delete', 'as' => 'courses.delete'])->where('id', '[0-9]+');;

            Route::get('/lessons/{course_id}/list', ['uses' => 'LessonController@index', 'as' => 'lessons.index'])->where('course_id', '[0-9]+');
            Route::get('/lessons/{id}/edit', ['uses' => 'LessonController@edit', 'as' => 'lessons.edit'])->where('id', '[0-9]+');
            Route::post('/lessons/{id}/update', ['uses' => 'LessonController@update', 'as' => 'lessons.update'])->where('id', '[0-9]+');
            Route::get('/lessons/{course_id}/create', ['uses' => 'LessonController@create', 'as' => 'lessons.create'])->where('course_id', '[0-9]+');
            Route::post('/lessons/{course_id}/store', ['uses' => 'LessonController@store', 'as' => 'lessons.store'])->where('course_id', '[0-9]+');
            Route::post('/lessons/delete/{id}', ['uses' => 'LessonController@delete', 'as' => 'lessons.delete'])->where('course_id', '[0-9]+');

            Route::post('/quizzes/{course_id}/store', ['uses' => 'QuizController@store', 'as' => 'quizzes.store'])->where('course_id', '[0-9]+');
            Route::post('/quizzes/{id}/update', ['uses' => 'QuizController@update', 'as' => 'quizzes.update'])->where('id', '[0-9]+');

            Route::get('/questions/{id}/list', ['uses' => 'QuestionController@index', 'as' => 'questions.index'])->where('id', '[0-9]+');
        });

        Route::group(['middleware' => ['ROLE_OR:' . \App\Models\System\Role::ROLE_USER]], function () {

        });
    });
});