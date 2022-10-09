<?php

use App\Jobs\newMailLaravel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Log;

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

Route::get('/mail/apikey={api_ley}/{nome}+{email}+{assunto}+{corpo_email}+{agendar?}', function ($api_key,$name,$email,$assunto,$corpo_email,$agendar='') {

    try{
        if($api_key==="qwe123456"){

            $user = new stdClass();
            $user->name = $name;
            $user->email = $email;
            $user->assunto = $assunto;
            $user->corpo_email = $corpo_email;
        
            if($agendar === ''){

                //\Illuminate\Support\Facades\Mail::send(new \App\Mail\newMailLaravel($user));
                \App\Jobs\newMailLaravel::dispatch($user)->delay(now()->addSecond('1'));

                $logs = new Log;

                $logs->name = $user->name;
                $logs->email = $user->email;
                $logs->assunto = $user->assunto;
                $logs->corpo_email = $user->corpo_email;

                $logs->save();

                return response()->json(['message'=>'message sent with success']);

            }else{

                $date = new DateTime("now", new DateTimeZone("America/Belem"));
                $date2 = new DateTime($agendar, new DateTimeZone("America/Belem"));

                $diffDate = $date2->getTimestamp() - $date->getTimestamp();

                \App\Jobs\newMailLaravel::dispatch($user)->delay(now()->addSecond($diffDate));

                $logs = new Log;

                $logs->name = $user->name;
                $logs->email = $user->email;
                $logs->assunto = $user->assunto;
                $logs->corpo_email = $user->corpo_email;

                $logs->save();

                return response()->json(['message'=>'message scheduled with success']);

            };
        
        }else{

            return response()->json(['message'=>'apikey error']);
            
        }
        
    }catch(\Exception $e){
        return response()->json(['message'=>$e->getMessage()], status: 404);
    };
});
