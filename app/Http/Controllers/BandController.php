<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{

  public function store(Request $request)
  {
    $validated = $request->validate([
      'id' => 'required|numeric',
      'name' => 'required',
    ]);
    return response()->json($request->all());
  }

  public function getAll(){
    $bands = $this->getBands();
    return response()->json([$bands]);
  }

  public function getById($id)
  {
    $band = null;
    foreach($this->getBands() as $_band){
      if($_band['id'] == $id){
        $band = $_band;
      }
    }
    return $band ? response()->json($band) : abort(code: 404);
  }

  public function getByGender($gender)
  {
    $bands = [];
    foreach ($this->getBands() as $_band) {
      if (preg_replace('/[^a-z0-9]/i', '', preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), strtolower($_band['gender']))) ==  preg_replace('/[^a-z0-9]/i', '', preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"), strtolower($gender)))) {
        $bands[] = $_band;
      }
    }
    return $bands ? response()->json($bands) : abort(code: 404);
  }

  public function getBands(){
    return [['id' => '5', 'name' => 'Coldplay', 'gender' => 'Rock']
           ,['id' => '2', 'name' => 'Michael Jackson', 'gender' => 'Pop']
           ,['id' => '3', 'name' => 'BTS', 'gender' => 'K-Pop']
           ,['id' => '4', 'name' => 'Calypso', 'gender' => 'Forró']
           ,['id' => '1', 'name' => 'The Beatles', 'gender' => 'Rock']];
  }
}
