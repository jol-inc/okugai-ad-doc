<div class="col-md-2">
  <div>
    <ul class="list-unstyled">
      <li> <a href=" {{ route('/') }} " 
        class="{{url()->current() == route('/') ? 'list-group-item list-group-item-action bg-primary text-white' : 'list-group-item list-group-item-action bg-light'}}">TOP</a>
      </li>

      <li> <a href=" {{ route('ad.index') }} " class="{{url()->current() == route('ad.index') ? 'list-group-item list-group-item-action bg-primary text-white' : 'list-group-item list-group-item-action bg-light'}}">全広告</a>
      </li>

      <li> <a href=" {{ route('ad.adkind',1) }} " class="{{url()->current() == route('ad.adkind',1) ? 'list-group-item list-group-item-action bg-primary text-white' : 'list-group-item list-group-item-action bg-light'}}">建物、ビル</a>
      </li>
      <li> <a href=" {{ route('ad.adkind',2) }} " class="{{url()->current() == route('ad.adkind',2) ? 'list-group-item list-group-item-action bg-primary text-white' : 'list-group-item list-group-item-action bg-light'}}">道路</a>
      </li>
      <li> <a href=" {{ route('ad.adkind',3) }} " class="{{url()->current() == route('ad.adkind',3) ? 'list-group-item list-group-item-action bg-primary text-white' : 'list-group-item list-group-item-action bg-light'}}">電車、バス</a>
      </li>
      <li> <a href=" {{ route('ad.adkind',4) }} " class="{{url()->current() == route('ad.adkind',4) ? 'list-group-item list-group-item-action bg-primary text-white' : 'list-group-item list-group-item-action bg-light'}}">タクシー</a>
      </li>

      <li> <a href=" {{ route('advertiser') }} " class="{{url()->current() == route('advertiser') ? 'list-group-item list-group-item-action bg-primary text-white' : 'list-group-item list-group-item-action bg-light'}}">広告主（マイページ）</a>
      </li>

    </ul>
  </div>
</div>