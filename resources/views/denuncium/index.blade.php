@extends('adminlte::page')

@section('template_title')
    Denuncium
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Denuncias') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('denuncia.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Cod Denuncia</th>
										<th>Ced Denunciante</th>
										<th>Casos Id</th>
                                        <th>Rol</th>
										<th>Codigo User</th>
										<th>Victima</th>
										<th>Victimario</th>
										<th>Email Contacto</th>
										<th>Num Contacto</th>
										<th>Estatus</th>
										<th>Direccion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($denuncia as $denuncium)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $denuncium->cod_denuncia }}</td>
											<td>{{ $denuncium->ced_denunciante }}</td>
											<td>{{ $denuncium->casos_id }}</td>
                                            <td>{{ $denuncium->rol }}</td>
											<td>{{ $denuncium->codigo_user }}</td>
											<td>{{ $denuncium->victima }}</td>
											<td>{{ $denuncium->victimario }}</td>
											<td>{{ $denuncium->email_contacto }}</td>
											<td>{{ $denuncium->num_contacto }}</td>
											<td>{{ $denuncium->estatus }}</td>
                                            <td>{{ $denuncium->direccion }}</td>

                                            <td>
                                                <form action="{{ route('denuncia.destroy',$denuncium->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('denuncia.show',$denuncium->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('denuncia.edit',$denuncium->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $denuncia->links() !!}
            </div>
        </div>
    </div>
@endsection
