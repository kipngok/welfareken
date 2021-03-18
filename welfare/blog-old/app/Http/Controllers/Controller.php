<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function process(Request $request)
    {
        //
        $input=$request->all();
        $url=$input['url'];
  		$school=$input['school'];
  		$class=$input['class'];
  		$subscription=$input['subscription'];
  		return redirect('/'.$url.'/'.$school.'/'.$class.'/'.$subscription);
    }
}
