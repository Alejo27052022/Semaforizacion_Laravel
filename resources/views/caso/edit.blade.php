@extends('adminlte::page')

@section('template_title')
    Update Caso
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Caso</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('casos.update', $caso->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('caso.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
