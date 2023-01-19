<!-- Modal Structure -->
<div id="delete-{{$product->id}}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">delete</i>Tem certeza?</h4>
      
        <div class="row">
         

          <p>Tem certeza que deseja excluir {{$product->name}} ?</p>        

        </div> 
       
        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>

        <form action="{{route('admin.product.delete', $product->id)}}" method="POST">
            @method('DELETE')
            @csrf
        <button type="submit" class="waves-effect waves-green btn red right">Deletar</button><br>
        </form>
    </div>
    
  
  </div>
  