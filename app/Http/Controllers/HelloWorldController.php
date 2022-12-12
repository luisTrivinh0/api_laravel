<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
  public function hello($name){
    return response()->json(['boas_vindas' => "Hello {$name}!"
                           , 'despedida' => "Bye {$name}!"]);
  }
}
