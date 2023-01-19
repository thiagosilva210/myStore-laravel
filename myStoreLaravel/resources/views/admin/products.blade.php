@extends('admin.layout')

@section('title', 'Products')
@section('content')

<div class="fixed-action-btn">
    <a  class="btn-floating btn-large bg-gradient-green modal-trigger" href="#create">
      <i class="large material-icons">add</i>
    </a>   
  </div>

  @include('admin.products.create')
    
   

    <div class="row container crud">


        
            <div class="row titulo ">              
              <h1 class="left">Produtos</h1>
              <span class="right chip">{{$products->count()}} produtos exibidos neste página</span>  
            </div>

           <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input placeholder="Pesquisar..." id="search" type="search" required>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>     

            <div class="card z-depth-4 registros" >
              @include('admin.includes.messages')
            <table class="striped ">
                <thead>
                  <tr>
                    <th></th>
                    <th>ID</th>  
                    <th>Produto</th>
                      
                      <th>Preço</th>
                      <th>Categoria</th>
                      <th></th>
                  </tr>
                </thead>
        
                <tbody>

                    @foreach($products as $product)

                  <tr>
                    <td><img src="{{ url("storage/{$product->img}") }}" class="circle "></td>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>                    
                    <td>{{number_format($product->price, 2, ',','.')}}</td>
                    <td>{{$product->category->name}}</td>
                    <td><a class="btn-floating  waves-effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                      <a href="#delete-{{$product->id}}" class="btn-floating modal-trigger waves-effect waves-light red"><i class="material-icons">delete</i></a></td>

                      @include('admin.products.delete')
                     


                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div> 

            <div class="row center">
                {{$products->links('custom.pagination')}}
              </div>
                      
    </div>
       

    @endsection