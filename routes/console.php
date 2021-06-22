<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Artisan::command('make:user', function () {
    $user = User::firstOrNew(array('name' => 'Sebastian Schindler'));
    $user->password = Hash::make('48H5MVswxXr7WJT');
    $user->email = 'Sebastian_Schindler@statev.de';
    $user->name = 'Sebastian Schindler';
    $user->nextHash = Str::random(30);
    $user->api_token = Str::random(60);
    $user->isAdmin = true;
    $user->save();
    $this->line('Nutzer erstellt');
})->purpose('Make Standard User');

Artisan::command('make:reader', function () {
    $user = User::firstOrNew(array('name' => 'Reader'));
    $user->password = Hash::make('48H5MVswxXr7WJT');
    $user->email = 'Reader@statev.de';
    $user->name = 'Reader';
    $user->nextHash = Str::random(30);
    $user->api_token = 'Backend';
    $user->save();
    $this->line('Reader erstellt');
})->purpose('Make Frontend API Connection');
