<!-- Modal Structure -->
<div id="deleteCategoria-{{$categoria->id}}" class="modal">
    <div class="modal-content">
        <h4><i class="material-icons">delete</i> Tem certeza ?</h4>
            <div class="row">
                <p>Tem certeza que deseja excluir a categoria {{$categoria->nome}} ?</p>
            </div> 
        
            <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a>
            <form action="{{route('admin.categorias.delete', $categoria->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="waves-effect waves-green btn red right">Excluir</button><br><br>
            </form>
    </div>
</div>
    