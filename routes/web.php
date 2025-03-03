<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;

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


Route::get('/', [SurveyController::class, 'home'])->name('home');
Route::get('survey/create', [SurveyController::class, 'create'])->name('create');
Route::post('/survey', [SurveyController::class, 'addq']);
Route::get('/survey/load', [SurveyController::class, 'loadDB'])->name('surveyList');
Route::delete('survey/del/{id}', [SurveyController::class, 'delete'])->name('surveys.destroy');
Route::get('survey/Questions/{id}', [SurveyController::class, 'loadQuestion'])->name('loadQuestion');
Route::post('/survey/store', [SurveyController::class, 'store'])->name('survey.store');
Route::get('survey/{id}', [SurveyController::class, 'redact']);
Route::post('/survey/replace', [SurveyController::class, 'replace']);
Route::get('/survey/responses', [SurveyController::class, 'showResponses']);






