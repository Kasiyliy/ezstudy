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

//    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'ResetPasswordController@showResetForm']);
//    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'ForgotPasswordController@showLinkRequestForm']);
//    Route::post('password/email', ['as' => 'password.email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
//    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'ResetPasswordController@reset']);
//    Route::get('register', ['as' => 'register', 'uses' => 'RegisterController@showRegistrationForm']);
//    Route::post('register', ['as' => 'register.post', 'uses' => 'RegisterController@register']);


});

Route::group(['namespace' => 'Web'], function () {

    Route::get('/secure/config', ['uses' => 'ConfigController@command']);
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


            Route::get('/quizzes', ['uses' => 'QuizController@index', 'as' => 'quizzes.index']);
            Route::get('/quizzes/{id}', ['uses' => 'QuizController@pass', 'as' => 'quizzes.pass'])->where('id', '[0-9]+');
            Route::post('/quizzes/{course_id}/store', ['uses' => 'QuizController@store', 'as' => 'quizzes.store'])->where('course_id', '[0-9]+');
            Route::post('/quizzes/{id}/update', ['uses' => 'QuizController@update', 'as' => 'quizzes.update'])->where('id', '[0-9]+');

            Route::get('/questions/{id}/list', ['uses' => 'QuestionController@index', 'as' => 'questions.index'])->where('id', '[0-9]+');
            Route::get('/questions/{id}/create', ['uses' => 'QuestionController@create', 'as' => 'questions.create'])->where('id', '[0-9]+');
            Route::post('/questions/{id}/store', ['uses' => 'QuestionController@store', 'as' => 'questions.store'])->where('id', '[0-9]+');
            Route::post('/questions/{id}/delete', ['uses' => 'QuestionController@delete', 'as' => 'questions.delete'])->where('id', '[0-9]+');

            Route::get('/options/{question_id}/list', ['uses' => 'OptionController@index', 'as' => 'options.index'])->where('question_id', '[0-9]+');
            Route::get('/options/{question_id}/create', ['uses' => 'OptionController@create', 'as' => 'options.create'])->where('question_id', '[0-9]+');
            Route::post('/options/{question_id}/store', ['uses' => 'OptionController@store', 'as' => 'options.store'])->where('question_id', '[0-9]+');
            Route::post('/options/delete/{id}', ['uses' => 'OptionController@delete', 'as' => 'options.delete'])->where('question_id', '[0-9]+');
        });

        Route::group(['middleware' => ['ROLE_OR:' . \App\Models\System\Role::ROLE_USER]], function () {
            Route::get('/pass/quiz/{course_id}', ['uses' => 'QuizController@passCourseTest', 'as' => 'quiz.course.pass'])
                ->where('course_id', '[0-9]+');
            Route::post('/pass/course/quiz/{id}', ['uses' => 'QuizResultController@pass', 'as' => 'quiz.course.pass.store'])
                ->where('id', '[0-9]+');


            Route::get('/my-certificates', ['uses' => 'CertificateController@myCertificates', 'as' => 'my.certificates']);
            Route::get('/get-certificates/{id}', ['uses' => 'CertificateController@certificate', 'as' => 'get.certificate'])->where('id', '[0-9]+');

            Route::get('/my-courses', ['uses' => 'CourseController@myCourses', 'as' => 'my.courses']);
            Route::get('/pass-lesson/{courseId}/{lessonId?}', ['uses' => 'LessonController@pass', 'as' => 'pass.lesson'])
                ->where('courseId', '[0-9]+')
                ->where('lessonId', '[0-9]+');

        });
    });
});
