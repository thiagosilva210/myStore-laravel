@extends('layout')
@section('title', 'home page')
@section('content')

{{--  --}}

<div class="row container">

    <h5>Categoria: {{$category->name}} </h5>

    @foreach($products as $product)
    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
              <img src="{{$product->img}}">
             
              <a href={{route('details', $product->slug)}} class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
            </div>
            <div class="card-content">
                <span class="card-title">{{$product->name}}</span>
              <p>{{Str::limit($product->description, 20) }}</p>
            </div>
          </div>
    </div>
   
    @endforeach
   
    
    
   
</div>

<div class="row center">
    {{$products->links('custom.pagination')}}
</div>

@endsection