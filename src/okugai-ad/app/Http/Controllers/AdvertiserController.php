<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


class AdvertiserController extends Controller
{
  public function index(){




//▼▼▼▼▼▼▼▼▼▼ web.php でRoute::group(['middleware' => 'auth'] の為、try catch  しても効かない

    $advertiser = Auth::user();

    return view('advertiser.index',compact('advertiser'));
  }
  
}
