<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;




class BotManController extends Controller
{
    public function handle(){
        $botman=app('botman');
        $botman->hears('{message}',function($botman,$message){
            if($message =='hola'){
                $this->askName($botman);

            }else{
                $botman->reply("Write 'hola' for testing... ");
            }
            

        });
        $botman->listen();

    }
    public function askName($botman){
        $botman->ask(" Hola ! como te llamas? ",function(Answer $answer){
               $name=$answer->getText();
               $this->say('mucho gusto '.$name);
        });

    }






}
