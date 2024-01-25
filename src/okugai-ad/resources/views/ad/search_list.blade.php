@extends('layouts.base')

@section('title', '広告検索結果')

@section('content')

<div class="container">
  <div class="row justify-content-center">

    @include('includes.side')

    <div class="col-md-10">
    {{-- <div class="col-md-12"> --}}


      {{--$kind_name が無ければ--}}
      @if( !isset($kind_name))
        <h4>全広告　一覧</h4> 
        <span class="text-danger">{{ count($ads) }}件</span>
      {{--$kind_name が no なら--}}
      @elseif( $kind_name === 'no' )
        <h4 class="alert alert-danger">お探しの種類の広告はありません。</h4>
      {{--$kind_name が それ以外なら--}}
      @else
        <h4>{{ $kind_name }}広告　一覧</h4>
        <span class="text-danger">{{ count($ads) }}件</span>
      @endif

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
            <td><a href="{{ route('ad.addetail',$ad->id) }}">{{$ad->name}}</a></td>
            <td>{{$ad->place}}</td>
            <td>{{$ad->price}} 円</td>
            <td>{{$ad->adKind->name}}</td>
            <td>{{$ad->advertiser->name}}</td>
          </tr>
        @endforeach
      </table>

      <div class="d-flex justify-content-center">
        {{ $ads->links() }}
      </div>

    </div>
  </div>
</div>

@endsection