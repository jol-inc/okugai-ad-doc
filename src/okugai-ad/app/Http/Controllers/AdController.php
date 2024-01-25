<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Support\Facades\Auth;
use App\Models\AdKind;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller; // ←追加



// 広告を検索、管理する為のコントローラ
class AdController extends Controller
{

  /**
   *全広告一覧
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    try {
      $ads = Ad::with('adKind')->with('advertiser')->paginate(5);
    } catch (\Exception $e) {
      abort(500);
    }

    return view('ad.search_list',compact('ads'));
  }





  /**
   * 広告検索（種類別）
   * @param  int  $id
   * @return \Illuminate\Http\Response
   *
   */
  public function adKind($kind_id=""){

    //広告種別パラメータナシ（全件）
    if($kind_id==""){
//ここ　　▼▼▼▼▼▼▼▼▼▼（ルートパラメータ）ナシ全件のアクションにリダイレクトしたい。▼▼▼▼▼▼▼▼▼▼

      try {
        $ads = Ad::with('AdKind')->paginate(5);
      } catch (\Exception $e) {
        abort(500);
      }

      return view('ad.search_list',compact('ads'));

    //広告種別パラメータアリ（種類で絞り込み）
    }else{

      try {

        //▼広告一覧
        //ルートパラメータの値によっては、検索結果が 0件 となるが、エラーにはならない。
        $ads = Ad::with('adKind')->with('advertiser')->where('kind_id', '=', $kind_id)->paginate(5);


        //▼広告種別名

        //広告種別（ルートパラメータ）の値は合っているが該当広告が 0件
        if( AdKind::where('kind_id', '=', $kind_id)->exists() ){
          $kind_name = AdKind::where('kind_id', '=', $kind_id)->first()->name;
        //広告種別（ルートパラメータ）の値が想定外
        }else{
          $kind_name = 'no';
        }

      } catch (\Exception $e) {
        abort(500);
      }


      return view('ad.search_list',compact('ads','kind_name'));
    }

  }



  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function adDetail($id)
  {

    try {
      $ad = Ad::with('adkind')->with('advertiser')->find($id);
    } catch (\Exception $e) {
      abort(500);
    }

    return view('ad.addetail',compact('ad'));
  }





}
