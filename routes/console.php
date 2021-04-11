<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('make:user', function () {
    $user = User::firstOrNew(array('name' => 'Sebastian Schindler'));
    $user->password = Hash::make('123');
    $user->email = 'Sebastian_Schindler@statev.de';
    $user->name = 'Sebastian Schindler';
    $user->nextHash = Str::random(30);
    $user->api_token = 'Backend';
    $user->save();
    $this->line('Nutzer erstellt');
})->purpose('Make Standard User');
