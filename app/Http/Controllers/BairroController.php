<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BairroRequest;

use App\Bairro;

class BairroController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bairros = Bairro::query()->paginate(50);
        return view('bairros.index', compact('bairros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("bairros.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ContatoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BairroRequest $request)
    {
        Bairro::create($request->all());
        $url = $request->get('redirect_to', route('bairros.index'));
        $request->session()->flash('message', 'Cadastrado com sucesso!');

        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bairro $bairro)
    {
        return view('bairros.edit', compact('escola'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BairroRequest $request, Bairro $bairro)
    {
        $bairro->fill($request->all());
        $bairro->save();
        $url = $request->get('redirect_to', route('bairros.index'));
        $request->session()->flash('message', 'Alterado com sucesso!');

        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Bairro $bairro)
    {
        $bairro->delete();
        $request->session()->flash('message', 'Excluído com sucesso!');
        return redirect()->route('bairros.index');
    }
}
