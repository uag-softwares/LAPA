@extends('layouts.app')

@section('titulo', 'Gerenciar Materiais')
@section('content')
        <div class="container">
            <h2>Gerenciar Materiais</h2>
            <a href="{{ route('auth.material.adicionar') }}" class="btn mb-2">Adicionar</a>
            
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive">
              <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>Título</th>
            			<th>Disciplina</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                        <td>
                            <a href="{{ route('auth.material.editar', $registro->slug) }}" class="btn">Editar</a>
                            <a href="{{ route('auth.material.deletar', $registro->slug) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar o material?');">Deletar</a>
                        </td>
                        <td>{{ $registro->titulo }}</td>
                        <td>{{ isset($registro->disciplina) ? ucfirst($registro->disciplina->nome) : 'Nenhum professor' }}
                    </tr>
                    @endforeach
                </tbody>
              </table>
              
         </div>
        </div>
@endsection
@section('scripts')

    <script>  
      $(document).ready( function () {
      $('#myTable').DataTable( {
      "columnDefs": [
      { "orderable": false, "targets":'_all'}
      ],
      "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
      }
      } );
      } );
    
    </script>
   
@endsection