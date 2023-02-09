<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use Illuminate\Http\Request;

/**
 * Class AsistenteController
 * @package App\Http\Controllers
 */
class AsistenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistentes = Asistente::paginate();

        return view('asistente.index', compact('asistentes'))
            ->with('i', (request()->input('page', 1) - 1) * $asistentes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asistente = new Asistente();

        $options = [
            '' => 'Seleccione Caso',
            '1' => 'Codigo Amarillo',
            '2' => 'Codigo Verde',
            '3' => 'Codigo Rosa',
            '4' => 'Codigo Naranja',
            '5' => 'Codigo Rojo',
            '6' => 'Codigo Violeta',
        ];

        return view('asistente.create', compact('asistente', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $options = [
            '' => 'Seleccione el Caso',
            '1' => 'Codigo Amarillo',
            '2' => 'Codigo Verde',
            '3' => 'Codigo Rosa',
            '4' => 'Codigo Naranja',
            '5' => 'Codigo Rojo',
            '6' => 'Codigo Violeta',
        ];

        request()->validate(Asistente::$rules);

        $asistente = Asistente::create($request->all());

        return redirect()->route('asistentes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $cod_asistente
     * @return \Illuminate\Http\Response
     */
    public function show($cod_asistente)
    {
        $asistente = Asistente::find($cod_asistente);

        return view('asistente.show', compact('asistente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $cod_asistente
     * @return \Illuminate\Http\Response
     */
    public function edit($cod_asistente)
    {
        $options = [
            '' => 'Seleccione el Caso',
            '1' => 'Codigo Amarillo',
            '2' => 'Codigo Verde',
            '3' => 'Codigo Rosa',
            '4' => 'Codigo Naranja',
            '5' => 'Codigo Rojo',
            '6' => 'Codigo Violeta',
        ];

        $asistente = Asistente::find($cod_asistente);

        return view('asistente.edit', compact('asistente', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asistente $asistente
     * @return \Illuminate\Http\Response
     */

     public function update($cod_asistente)
     {
         request()->validate(Asistente::$rules);

         $asistente = Asistente::where('cod_asistente', $cod_asistente)->first();
         $asistente->update(request()->all());

         return redirect()->route('asistentes.index')
             ->with('success', 'Asistente actualizado exitosamente');
     }

    /**
     * @param int $cod_asistente
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

     public function destroy($cod_asistente)
     {
        $Asistente = Asistente::where('cod_asistente', $cod_asistente)->delete();

         return redirect()->route('asistentes.index')
             ->with('success', 'Asistente eliminado exitosamente');
     }
}
