<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::resource('campaigns', 'CampaignController');
Route::resource('comments', 'CommentController');
Route::resource('employee', 'EmployeeController');
Route::resource('position', 'PositionController');
