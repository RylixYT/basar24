<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'layouts.app')->middleware("auth");

Auth::routes();
