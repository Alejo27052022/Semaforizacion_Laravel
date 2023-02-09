@extends('adminlte::page')

@section('content')

@section('plugins.Sweetalert2', true)

@section('title', 'Inicio')
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido Administrador</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        EL Consejo de la Judicatura te da un cordial saludo, si tienes alguna duda de como administrar
                        o como se maneja el sitio web, no dudes en consultar al técnico para que pueda darte una mano.

                        Saludos!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
        Swal.fire(
            '¡Has Iniciado Correctamente!',
            '¡Bienvenido Administrador!',
            'success'
            )
    </script>
@stop

@endsection

