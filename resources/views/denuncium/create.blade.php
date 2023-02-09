@extends('layouts.app_profile')

@section('template_title')
    Create Denuncium
@endsection

@section('content')
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/static/assets_home/css/main.css">
        <link rel="stylesheet" href="/static/assets_home/css/semaforo.css">


        <!-- GOOGLE FONTs -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="/usuario/css/style.css">

        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!-- ANIMATE CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

        <title>Denuncias</title>

    </head>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Denuncium</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('denuncia.store') }}" href="{{route('info')}}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('denuncium.form')

                        </form>

                    </div>


            </div>
        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
