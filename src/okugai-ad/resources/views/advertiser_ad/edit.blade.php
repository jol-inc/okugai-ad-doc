@extends('layouts.base')

@section('title', '広告登編集フォーム')

@section('content')

<div class="container">
  <div class="row justify-content-center">

    @include('includes.side')

    <div class="col-md-10">

      <div class="col-md-6">

        <H4>広告編集フォーム</H4>
        @if (session('message'))
          <div class="alert alert-success">
            {{ session('message') }}
          </div>
        @endif

        @if ($errors->any())
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


        <form action="{{route('advertiser_ad.update',$ad->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name1">広告名</label>
            <input type="text" name="name" class="form-control" id="name1" value="{{ old('name',$ad->name) }}">
          </div>
          <div class="form-group">
            <label for="name1">場所</label>
            <input type="text" name="place" class="form-control" id="name1" value="{{ old('place',$ad->place) }}">
          </div>
          <div class="form-group">
            <label for="name1">料金</label>
            <input type="text" name="price" class="form-control" id="name1" value="{{ old('price',$ad->price) }}">
          </div>

          <div class="form-group">
            <div>種別</div>
            <select  name="kind_id" class="form-select" aria-label="Default select example">
              <option value="">ー</option>
              @foreach($ad_kinds as $ad_kind)
                <option value="{{ $ad_kind->kind_id }}"  {{ $ad_kind->kind_id === $ad->kind_id? 'selected': '' }}    >{{ $ad_kind->name }}</option>
              @endforeach
            </select>
          </div>


          <br>

          
          <div class="form-group">
            <label for="image">画像</label>
            <input type="file" name="image" class="form-control">
            <br>
            @if( $ad->image)
            <img src="{{asset('storage/images/'.$ad->image)}}" style="height:100px">   
            @endif
            <br><br>
          </div>

          <button onclick="return confirm('編集して宜しいですか？')" class="btn btn-primary">送信</button>
        </form>
      </div>
    </div>
  </div>
</div>
  
@endsection