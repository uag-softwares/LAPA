@extends('layouts.app')

@section('titulo', 'Confirmação do e-mail')
@section('content')
        <div class="container col-11 col-md-10 col-lg-10 p-0">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    {!! Session::get('success') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
@endsection