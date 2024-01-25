<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\AdvertiserAdController;
use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Auth;




//Auth
// 基本的な認証機能に関連するルートを生成

//通常の認証ルートのみでＯＫ。メール認証ルートを生成不要な場合
Auth::routes();

//メール認証ルートを生成する場合
// Auth::routes(['verify' => true]);





//TOP画面
Route::get('/', function () {
  return view('top');
})->name('/');





//閲覧者 広告検索（全件）
Route::get('ad', [AdController::class, 'index'])->name('ad.index');

//閲覧者 広告検索（種類別）
Route::get('ad/adkind/{kind_id?}', [AdController::class, 'adKind'])->name('ad.adkind');

//閲覧者 広告詳細
Route::get('ad/addetail/{id}', [AdController::class, 'adDetail'])->name('ad.addetail');




// メール認証をこのgroupに適用しない場合
Route::group(['middleware' => 'auth'], function (){

// メール認証をこのgroupに適用する場合
// Route::group(['middleware' => ['auth','verified']], function (){


  //広告主 （マイページ）
  Route::get('advertiser', [AdvertiserController::class, 'index'])->name('advertiser');


  //広告主 自社広告リスト
  Route::get('advertiser_ad/myad', [AdvertiserAdController::class, 'myAd'])->name('advertiser_ad.myad');

  //広告主 自社広告管理（登録、編集、削除）
  Route::resource('advertiser_ad', AdvertiserAdController::class ,['except' => ['index', 'show']] );

});