@extends('layouts.app')

@section('titulo', 'Gerenciar visitas')
@section('content')
        <div class="container">
            <h2>Gerenciar solicitações de visitas</h2>
            <a href="{{ route('site.visita.busca') }}" class="btn mb-2">Agendar</a>
            
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
                        <th>Responsável</th>
                        <th>Data</th>
                        <th>Email</th>
                        <th>Confirmada?</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($registros as $registro)
                    <tr>
                         <td>
                            <a href="{{ route('auth.visita.ver', $registro->slug) }}" class="btn">Ver</a>
                            <a href="{{ route('auth.visita.deletar', $registro->id) }}" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja cancelar essa visita?');">Cancelar</a>
                        </td>
                        <td>{{ $registro->user->name ?? '' }}</td>
                        <td>{{ date('d/m/Y', strtotime($registro->data)).' das '.date('H:i', strtotime($registro->hora_inicial)).' às '.date('H:i', strtotime($registro->hora_final)) }}</td>
                        <td>{{ $registro->user->email }}</td>
                        <td>{{ $registro->confirmada ? 'Sim' : 'Não' }}</td>
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