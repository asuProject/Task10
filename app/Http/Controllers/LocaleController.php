<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switch_language(Request $request ,$lang)
    {
        if(isset($lang) && !empty($lang)){
            $request->session()->put('mylocale',$lang);
        }
        return redirect()->back();
    }
}
