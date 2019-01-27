<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContatoRequest;

use App\Contato;
use App\Membro;
use App\Icon;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contato::query()->paginate(50);
        return view('contatos.index', compact('contatos'));
    }

    public function novo($membro_id)
    {
			$membro = Membro::find($membro_id);
			$icons = Icon::orderBy('nome','asc')->pluck('nome','id');
			return view("contatos.create", compact('membro', 'icons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ContatoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContatoRequest $request)
    {
        $contato = Contato::create($request->all());
        $request->session()->flash('message', 'Contato cadastrado com sucesso!');
        return redirect()->route('membros.show', ['membro' => $contato->membro_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato)
    {
			$membro = Membro::find($contato->membro_id);
			$icons = Icon::orderBy('nome','asc')->pluck('nome','id');
      return view('contatos.edit', compact('contato', 'membro', 'icons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContatoRequest $request, Contato $contato)
    {
        $contato->fill($request->all());
        $contato->save();
				$request->session()->flash('message', 'Acompanhante alterado com sucesso!');
				return redirect()->route('membros.show', ['membro' => $contato->membro_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contato $contato)
    {
				$contato->delete();
				$request->session()->flash('message', 'Contato Excluído com sucesso!');
				return redirect()->route('membros.show', ['membro' => $contato->membro_id]);
    }

		/*Método para uso de AJAX*/
    public function mudaEstadoContato($idContato)
    {
        $contato = Contato::find($idContato);
        $contato->ativo = $contato->ativo == 1 ? 0 : 1;
        $contato->save();
        return $contato->ativo;
    }

    /*Método para uso de AJAX*/
    public function mudaVisibilidadeContato($idContato)
    {
        $contato = Contato::find($idContato);
        $contato->publico = $contato->publico == 1 ? 0 : 1;
        $contato->save();
        return $contato->publico;
    }
}
