<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IOController extends Controller
{
    //
    // var $base_path = "localhost:8000";

    public function upload(Request $request, $name ,$folder) {
      if ($request->hasFile($name)) {
          //
        $base_folder = public_path();
        $full_path = $base_folder.DIRECTORY_SEPARATOR.$folder;
        $ext = $request->file($name)->getClientOriginalExtension();
        $nameOriginal = $request->file($name)->getClientOriginalName();
        //$exp = array_reverse(explode('.',$nameOriginal));
        $archive = time().".".$ext;
        //dd($archive);
        $move = $request->file($name)->move($full_path, $archive);

        if($move) {
          return $folder.'/'.$archive;
        }

        return false;
      }
    }
}
