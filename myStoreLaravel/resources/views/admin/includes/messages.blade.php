@if($message = Session::get('success'))

@if($message = Session::get('success'))
<div class="card green darken-1">
<div class="card-content white-text">
      <span class="card-title">Parabéns</span>
      <p>{{$message}}</p>
    </div>
    
  </div>


@endif


@endif