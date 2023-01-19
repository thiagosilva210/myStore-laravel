@extends('layout')
@section('title', 'cart')
@section('content')

{{--  --}}

<div class="row container">


    @if($mensagem = Session::get('success'))
    <div class="card green darken-1">
    <div class="card-content white-text">
          <span class="card-title">Parabéns</span>
          <p>{{$mensagem}}</p>
        </div>
        
      </div>


    @endif


    @if($mensagem = Session::get('notice'))
    <div class="card blue">
    <div class="card-content white-text">
          <span class="card-title">Tudo bem</span>
          <p>{{$mensagem}}</p>
        </div>
        
      </div>


    @endif

    @if($itens->count() == 0)
    <div class="card orange">
        <div class="card-content white-text">
              <span class="card-title">Seu carrinho está vazio</span>
              <p>Aproveite nossas promoções</p>
            </div>
            
          </div>
    


    @else
    <h5>Seu carrinho possui {{$itens->count()}} produtos </h5>

   

    <table class="stripped">
        <thead>
          <tr>
              <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th></th>
          </tr>
        </thead>

        <tbody>

            @foreach($itens as $item)

          <tr>
            <td><img src="{{$item->attributes->img}}" alt="" width="70" class="responsive-img circle"></td>
            <td>{{$item->name}}</td>
            <td>R$ {{number_format($item->price, 2, ',', '.') }}</td>

            {{--BTN UPDATE--}}
            <form action="{{route('updatecart')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="id" type="hidden" value="{{$item->id}}">
            <td><input style="width: 40px; font-weight: 900;"  class="white center" min="1" type="number" name="quantity" value="{{$item->quantity}}"></td>
            <td>
                <button class="btn-floating waves-effect waves-light red"><i class="material-icons">refresh</i></button> 
            </form>
            
            {{--BTN REMOVE--}}
            <form action="{{route('removecart')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <input name="id" type="hidden" value="{{$item->id}}">
            <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
            </form>

    </td>
        </tr>

        @endforeach
         
        </tbody>
      </table>

      

      <div class="card green darken-1">
        <div class="card-content white-text">
              <span class="card-title">Valor total: R$ {{ number_format(\Cart::getTotal(), 2, ',','.')}}</span>
              <p>paguem em x vezes</p>
            </div>
            
          </div>
    


    @endif

   
   
    <div class="row container center">
        <td><a href="{{route('index')}}" class="btn waves-effect waves-light blue">Continuar comprando <i class="material-icons">arrow_back</i></a> </td>
        <td><a href="{{route('clearcart')}}" class="btn waves-effect waves-light blue">Limpar carrinho <i class="material-icons">clear</i></a> </td>
        <td><button class="btn waves-effect waves-light green">Finalizar pedido <i class="material-icons">cheeck</i></button> </td>
    </div>
   
    
    
   
</div>


@endsection
