@extends('layouts.base')

@section('title', 'TOPページ')
@section('content')

  <div class="container">

    <div class="row justify-content-center">

      @include('includes.side')

      <div class="col-md-10">

        <h4>～野外広告専門の検索サイト～</h4>

        <div class="mt-5">
          <img src="{{asset('site_images/'. 'hyoshi.jpg')}}" style="width:80%; height:100％">   
        </div>
        
        　<h5 style="color:blue; text-decoration:underline;">当サイトで出来る事</h5>
        <ul style="list-style:none">
          <li>広告主</li>
            <ul style="list-style:none">
              <li>・業者登録（メール認証は現状ナシですが、追加コード記載あり）</li>
              <li>・広告の登録、編集、削除</li>
              <li>・自社広告リスト</li>
            </ul>
          <li>閲覧者</li>
          <ul style="list-style:none">
            <li>・広告検索</li>
          </ul>
        </ul>

      </div>
    </div>
  </div>


@endsection