<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Models\Log;
use Carbon\Carbon;
use Mailgun\Mailgun;
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

Route::get('/', function () {});

Route::get('/mail/{nome}+{email}+{assunto}+{corpo_email}+{agendar?}', function ($name,$email,$assunto,$corpo_email,$agendar='') {

    $user = new stdClass();
    $user->name = $name;
    $user->email = $email;
    $user->assunto = $assunto;
    $user->corpo_email = $corpo_email;

    if(!empty($agendar)){
        print_r("agendado para ".$agendar);
    }

        
    return new \App\Mail\newMailLaravel($user);

});