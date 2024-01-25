@extends('layouts.base')

@section('title', '広告登録フォーム')

@section('content')

<div class="container">
  <div class="row justify-content-center">

    @include('includes.side')

    <div class="col-md-10">

      <H4>広告登録フォーム</H4>
      @if (session('message'))
          <div class="alert alert-success">
                {{ session('message') }}
            </div>
      @endif


      @if($errors->any())
        <div class="alert alert-danger">

          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach

            @empty($errors->first('image'))
            <li>
              画像ファイルがあれば、再度アップして下さい。
            </li>
            @endempty
            
          </ul>
        </div>
      @endif



      <form action="{{route('advertiser_ad.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name1">広告名</label>
          <input type="text" name="name" class="form-control" id="name1" value="{{ old('name') }}">
        </div>
        <div class="form-group">
          <label for="place">場所</label>
          <input type="text" name="place" class="form-control" id="place" value="{{ old('place') }}">
        </div>
        <div class="form-group">
          <label for="price">料金</label>
          <input type="text" name="price" class="form-control" id="price" value="{{ old('price') }}">
        </div>
        <div class="form-group">
          <div>種別</div>
          <select name="kind_id">
            <option value="">ー</option>
            @foreach($ad_kinds as $ad_kind)
              <option value="{{ $ad_kind->kind_id }}">{{ $ad_kind->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="image">画像</label>
          <div class="col-md-6">
            <input type="file" name="image" class="form-control">
          </div>
        </div>
        <br>

        <button onclick="return confirm('登録して宜しいですか？')" class="btn btn-primary">送信</button>
      </form>

    </div>
  </div>
</div>
  
@endsection