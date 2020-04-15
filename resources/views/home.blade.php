@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ações</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @guest
                        Você não está logado
                    @else
                        <a href="{{ route('auth.disciplinas') }}" class="btn">
                            {{ __('Disciplinas') }}
                        </a>
                        <a href="{{ route('auth.postagens') }}" class="btn">
                            {{ __('Postagens') }}
                        </a>
			<a href="{{ route('auth.materiais') }}" class="btn">
                            {{ __('Materiais') }}
                        </a>
                        <a href="#" class="btn">
                            {{ __('Agenda') }}
                        </a>
                        <a href="#" class="btn">
                            {{ __('Quem somos') }}
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
