@extends('layout')
@section('title', 'Details')
@section('content')

<div class="row container"><br>
    <div class="col s12 m6">
       <img src="{{$product->img}}" class="responsive-img">
    </div>

    <div class="col s12 m6">
        <h4>{{$product->name}}</h4>
        <h4>R$ {{number_format($product->price, 2, ',','.')}}</h4>
        <p>{{$product->description}}</p>
        <p>Postado por: {{$product->user->name}} <br>
        Categoria: {{$product->category->name}}
        </p>

        <form action="{{route('addcart')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}">
            <input type="hidden" name="name" value="{{$product->name}}">
            <input type="hidden" name="price" value="{{$product->price}}">
            <input type="number" min="1" name="qty" value="1">
            <input type="hidden" name="img" value="{{$product->img}}">
        <button class="btn orange btn-large">Comprar</button>
        </form>
    </div>

</div>
@endsection