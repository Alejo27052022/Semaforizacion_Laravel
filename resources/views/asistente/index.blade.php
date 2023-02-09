@extends('adminlte::page')

@section('template_title')
    Asistente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Asistente') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('asistentes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Cod Asistente</th>
										<th>Nom Asistente</th>
										<th>Last Asistente</th>
										<th>Cargo</th>
                                        <th>Encargad@ del Caso </th>
										<th>Email</th>
										<th>Pass</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asistentes as $asistente)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $asistente->cod_asistente }}</td>
											<td>{{ $asistente->nom_asistente }}</td>
											<td>{{ $asistente->last_asistente }}</td>
											<td>{{ $asistente->cargo }}</td>
                                            <td>{{ $asistente->cod_caso }}</td>
											<td>{{ $asistente->email }}</td>
											<td>{{ $asistente->pass }}</td>

                                            <td>
                                                <form action="{{ route('asistentes.destroy', ['asistente' => $asistente->cod_asistente]) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('asistentes.edit',$asistente->cod_asistente) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $asistentes->links() !!}
            </div>
        </div>
    </div>
@endsection
