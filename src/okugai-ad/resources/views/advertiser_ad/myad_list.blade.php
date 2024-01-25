@extends('layouts.base')

@section('title', '自社広告')

@section('content')

<div class="container">
  <div class="row justify-content-center">

    @include('includes.side')

    <div class="col-md-10">

      <h4>自社広告　一覧</h4> 

      <span class="text-danger">{{ count($ads) }}件</span>

      {{-- 広告削除フラッシュ --}}
      @if(session('ad_delete_message'))
        <div class="alert alert-success">
          {{ session('ad_delete_message') }}
        </div>
      @endif


      <table class="table table-striped table-hover">
        <tr>
          <th>広告名</th>
          <th>場所</th>
          <th>価格</th>
          <th>種別</th>
          <th>広告主</th>
        </tr>
        @foreach ($ads as $ad)
          <tr>
            <td><a href="{{ route('ad.addetail',$ad->ads_id) }}">{{$ad->ads_name}}</a></td>
            {{-- <td>{{$ad->ads_name}}</td> --}}
            <td>{{$ad->ads_place}} </td>
            <td>{{$ad->ads_price}} </td>
            <td>{{$ad->ad_kinds_name}} </td>
            <td>{{$ad->advertisers_name}} </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>

@endsection