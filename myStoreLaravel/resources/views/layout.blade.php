<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

 <!-- Dropdown Structure -->
 <ul id='dropdown1' class='dropdown-content'>
   @foreach($categoriesMenu as $categoryM)
   <li><a href="{{route('category', $categoryM->id)}}">{{$categoryM->name}}</a></li>
   @endforeach
 </ul>

 <!-- Dropdown Structure -->
 <ul id='dropdown2' class='dropdown-content'>
 
  <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
  <li><a href="{{route('login.logout')}}">Sair</a></li>
 
</ul>

  <nav>
    <div class="nav-wrapper container">
      <a href="{{route('index')}}" class="brand-logo center">Logo</a>

      <ul id="nav-mobile" class="left">
        <li><a href="{{route('index')}}">Home</a></li>
        <li><a href= "" class="dropdown-trigger" data-target='dropdown1'>Categorias <i class="material-icons right">expand_more</i></a></li>
        <li><a href="{{route('cart')}}">Carrinho<span class="new badge blue" data-badge-caption="">{{\Cart::getContent()->count()}}</span></a></li>
       
      </ul>

      @auth
      <ul id="nav-mobile" class="right">       
        <li><a href= "" class="dropdown-trigger" data-target='dropdown2'>Olá {{auth()->user()->name}} <i class="material-icons right">expand_more</i></a></li>               
      </ul>
      @else
      <ul id="nav-mobile" class="right">       
        <li><a href= "{{route('login.form')}}" >Login <i class="material-icons right">lock</i></a></li>               
      </ul>
      @endauth

    </div>
  </nav>
        

@yield('content')
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>

var elemDrop = document.querySelectorAll('.dropdown-trigger');
var instanceDrop = M.Dropdown.init(elemDrop,{
  coverTrigger: false,
  constraintWidth: false
});

</script>



<script>


  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  });

  // Or with jQuery

  $('.dropdown-trigger').dropdown();
</script>

</body>
</html>