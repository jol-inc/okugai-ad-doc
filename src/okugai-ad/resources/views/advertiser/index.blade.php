@extends('layouts.base')

@section('title', '広告主（マイページ）')

@section('content')

<div class="container">
  <div class="row justify-content-center">

    @include('includes.side')

    <div class="col-md-10">

      <h4>広告主（マイページ）</h4>

      ＩＤ：　　{{ $advertiser->id }}<br>
      会社名：　{{ $advertiser->name }}

      <div class="cate">
        <br> 
        <ul>
          <li> <a href=" {{ route('advertiser_ad.myad') }} " >自社広告リスト</a> </li>
          <li> <a href=" {{ route('advertiser_ad.create') }} " >新規広告登録</a> </li>
        </ul>
      </div>

    </div>
  </div>
</div>
  
@endsection