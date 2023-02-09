@extends('adminlte::page')

@section('template_title')
    Update Denuncium
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Denuncium</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('denuncia.update', $denuncium->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('denuncium.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
