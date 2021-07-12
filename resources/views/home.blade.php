@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <table class="table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NoPrescripcion</th>
                            <th scope="col">TipoTec</th>
                            <th scope="col">ConTec</th>
                            <th scope="col">NoEntrega</th>
                            <th scope="col">FecDireccionamiento</th>
                            <th scope="col">EstDireccionamiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($inscripcion as  $value)
                        <tr>
                            <th scope="col">{{$value->id}}</th>
                            <th scope="col">{{$value->NoPrescripcion}}</th>
                            <th scope="col">{{$value->TipoTec}}</th>
                            <th scope="col">{{$value->ConTec}}</th>
                            <th scope="col">{{$value->NoEntrega}}</th>
                            <th scope="col">{{$value->FecDireccionamiento}}</th>
                            <th scope="col">{{$value->EstDireccionamiento}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
