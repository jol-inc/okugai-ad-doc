@extends('layouts.base')

@section('title', '詳細ページ')

@section('content')

<div class="container">
  <div class="row justify-content-center">

    @include('includes.side')

    <div class="col-md-10">


      <div class="card mb-4">
        <div class="card-header">
          <h4>広告名：{{$ad->name}}</h4>



          {{-- ログイン中で広告主と閲覧者が同一なら表示 --}}
          @auth

            @if( $ad->advertiser->id === Auth::user()->id )
              <span class="ml-auto">
                <a href="{{ route('advertiser_ad.edit',$ad->id) }}"> <button class="btn btn-primary">編集</button> </a>
              </span>

              <span class="ml-auto">
                <form action="{{ route('advertiser_ad.destroy',$ad->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" onClick="return confirm('本当に削除しますか？')">削除</button>
                </form>
              </span>
            @endif

          @endauth



        </div>

        <div class="card-body">
          <p class="card-test">
            場所：{{$ad->place}}
          </p>
          <p class="card-test">
            料金：{{$ad->price}}円
          </p>
          <p class="card-test">
            種別：{{$ad->adkind->name}}
          </p>
          <p class="card-test">
            広告主：{{$ad->advertiser->name}}
          </p>
          <p class="card-test">
            画像：
            @if( $ad->image)
            <img src="{{asset('storage/images/'.$ad->image)}}" style="height:100px">   
            @endif
          </p>
        </div>

        <div class="card-footer">
          <p class="float-right">投稿日時{{$ad->created_at}}</p>
          <p class="float-right mb-0">更新日時{{$ad->updated_at}}</p>
        </div>
        
      </div>

    </div>
  </div>
</div>



  
@endsection