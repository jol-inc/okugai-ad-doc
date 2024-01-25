<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;
use App\Models\AdKind;
use Illuminate\Support\Facades\DB;

class AdvertiserAdController extends Controller
{


   /**
   * 広告表示（自社）
   *
   * @param  int  Auth::advertiser()->id
   * @return \Illuminate\Http\Response
   */
  public function myAd()
  {


    //ルートパラメータの値によっては、検索結果が 0件 となるが、エラーにはならない。
    // $ads = Ad::with('adKind')->with('user')->where('users.id', '=', Auth::user()->id)->paginate(5);


//ここ    ▼▼▼▼▼▼▼▼▼▼▼エラーがキャッチ出来ない。　▼▼▼▼▼▼▼▼▼▼▼
    try {
      $ads =  DB::table('ads')
      ->select('ads.id as ads_id','ads.name as ads_name','ads.place as ads_place','ads.price as ads_price','ad_kinds.name as ad_kinds_name','advertisers.name as advertisers_name')
      ->join('ad_kinds','ads.kind_id','=','ad_kinds.kind_id')
      ->join('advertisers','ads.advertiser_id','=','advertisers.id')
      ->where('ads.advertiser_id', '=', Auth::user()->id)
      ->get();
    } catch (\Exception $e) {
      abort(500);
    }
    

    return view('advertiser_ad.myad_list',compact('ads'));
  }



  //--------ここからresource--------


    /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
 
    try {
      $ad_kinds = AdKind::all();
    } catch (\Exception $e) {
    	abort(500);
    }

    return view('advertiser_ad.create',compact('ad_kinds'));
  }



  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $request->validate([
      'name' => 'required',
      'place' => 'required',
      'price' => 'required|integer',
      'kind_id' => 'required|integer',
      'image' => 'required'  //登録の時は画像は必須。
    ]);

    $ad = new Ad;

    $ad->kind_id  = $request->kind_id;
    $ad->advertiser_id  = Auth::user()->id;

    $ad->name  = $request->name;
    $ad->place = $request->place;
    $ad->price = $request->price;


    // 画像
    if(request('image')){
      $original_name = request()->file('image')->getClientOriginalName();//名前を取得
      $register_name = date('Ymd_His') . '_' . $original_name;
      $file = request()->file('image')->storeAs('public/images',$register_name);//フォルダに格納
      $ad->image = $register_name;//ＤＢに入れる名前を確定
    }

    // 例外処理
    DB::beginTransaction();
    try{
      $ad->save();
      DB::commit();
    } catch(\Throwable $e){
      DB::rollback();
      abort(500);
    }

    return back()->with('message','新規広告を保存しました。');

  }



  
  //showメソッドはAdcontroller を流用





  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {

//▼▼▼▼▼▼▼▼▼▼ try catch  出来ない（Routeで既にエラーになっている。）▼▼▼▼▼▼▼▼▼▼

    try {    
      $ad = Ad::with('adkind')->with('advertiser')->find($id);
      $ad_kinds = AdKind::all();  
    } catch (\Exception $e) {
      abort(500);
    }    

    return view('advertiser_ad.edit',compact('ad','ad_kinds'));
  }



  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {


    $request->validate([
      'name' => 'required',
      'place' => 'required',
      'price' => 'required|integer',
      'kind_id' => 'required|integer'
      //編集の時は画像は必須にしない。
    ]);

    $ad = Ad::find($id);
    $ad->kind_id  = $request->kind_id;
    // $ad->advertiser_id  = Auth::advertiser()->id;
    $ad->advertiser_id  = Auth::id();

    $ad->name  = $request->name;
    $ad->place = $request->place;
    $ad->price = $request->price;


    // 画像
    if(request('image')){
      $original_name = request()->file('image')->getClientOriginalName();//名前を取得
      $register_name = date('Ymd_His') . '_' . $original_name;
      $file = request()->file('image')->storeAs('public/images',$register_name);//フォルダに格納
      $ad->image = $register_name;//ＤＢに入れる名前を確定
    }


    // 例外処理
    DB::beginTransaction();
    try{
      $ad->save();
      DB::commit();
    } catch(\Throwable $e){
      DB::rollback();
      abort(500);
    }

    return back()->with('message','広告を編集しました。');

  }



  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

    $ad = Ad::findOrFail($id);

    // 例外処理
    DB::beginTransaction();
    try{
      $ad->delete();
      DB::commit();
    } catch(\Throwable $e){
      DB::rollback();
      abort(500);
    }

    return redirect(route('ad.index'))->with('ad_delete_message','広告を1件削除しました。');
  }


  //--------ここまでresource--------



}
