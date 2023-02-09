<?php

namespace App\Http\Controllers;


use App\Models\Denuncium;
use Illuminate\Http\Request;
use App\Rules\CedulaEcuador;


/**
 * Class DenunciumController
 * @package App\Http\Controllers
 */

class DenunciumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $denuncia = Denuncium::paginate();

        return view('denuncium.index', compact('denuncia'))
            ->with('i', (request()->input('page', 1) - 1) * $denuncia->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $denuncium = new Denuncium();
        $rol = [
            '' => 'Seleccione quien es Usted',
            'Denunciante' => 'Denunciante',
            'Victima' => 'Victima',
        ];

        $options = [
            '' => 'Seleccione el Caso',
            '1' => 'Codigo Amarillo',
            '2' => 'Codigo Verde',
            '3' => 'Codigo Rosa',
            '4' => 'Codigo Naranja',
            '5' => 'Codigo Rojo',
            '6' => 'Codigo Violeta',
        ];


        return view('denuncium.create', compact('denuncium', 'options', 'rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Denuncium::$rules);

        $request->validate([
            'ced_denunciante' => [new CedulaEcuador],
        ]);

        $denuncium = Denuncium::create($request->all());

        return redirect()->route('info')
        ->with('alert', '¡Su Denuncia se ha enviado exitosamente!');

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $denuncium = Denuncium::find($id);
        return view('denuncium.show', compact('denuncium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $denuncium = Denuncium::find($id);

        return view('denuncium.edit', compact('denuncium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Denuncium $denuncium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denuncium $denuncium)
    {
        request()->validate(Denuncium::$rules);

        $denuncium->update($request->all());

        return redirect()->route('denuncia.index')
            ->with('success', 'Denuncium updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $denuncium = Denuncium::find($id)->delete();

        return redirect()->route('denuncia.index')
            ->with('success', 'Denuncium deleted successfully');
    }
}
