<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AcompanhanteRequest;

use App\ManipulaImagem\ManipulaImagem;

use App\Acompanhante;
use App\Membro;

class AcompanhanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acompanhantes = Acompanhante::query()->paginate(50);
        $totalDeAcompanhantes = Acompanhante::all();
        return view('acompanhantes.index', compact('acompanhantes', 'totalDeAcompanhantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function novo($membro_id)
    {
			$membro = Membro::find($membro_id);
			return view('acompanhantes.create', compact('membro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AcompanhanteRequest $request)
    {
			$nomeImagemParaBancoDeDados = "";

			if($request->hasFile('alvara_SEMOB')){
					$imagem = $request->alvara_SEMOB;
					$nomeImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/acompanhantes/", 400);
			}

			Acompanhante::create([
					'nome' => $request->nome,
					'alvara_SEMOB' => $nomeImagemParaBancoDeDados,
					'ativo' => $request->ativo,
					'membro_id' => $request->membro_id
			]);

			$request->session()->flash('message', 'Adicionado com sucesso!');
			return redirect()->route('membros.show', ['membro' => $request->membro_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Acompanhante $acompanhante)
    {
			$membro = Membro::find($acompanhante->membro_id);
			return view('acompanhantes.edit', compact('acompanhante', 'membro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AcompanhanteRequest $request, Acompanhante $acompanhante)
    {

			if($request->hasFile('alvara_SEMOB')){
					$imagem = $request->alvara_SEMOB;
					$nomeNovaImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/acompanhantes/", 400);

					if ($request->alvara_SEMOB_Atual) {
							ManipulaImagem::deletaImagemNoServidor($request->alvara_SEMOB_Atual);
					}
					$acompanhante->alvara_SEMOB = $nomeNovaImagemParaBancoDeDados;
			} else {
					$acompanhante->alvara_SEMOB = $request->alvara_SEMOB_Atual;
			}

			$acompanhante->nome = $request->nome;
			$acompanhante->ativo = $request->ativo;
			$acompanhante->membro_id = $request->membro_id;

			$acompanhante->save();

			$request->session()->flash('message', 'Acompanhante alterado com sucesso!');
			return redirect()->route('membros.show', ['membro' => $acompanhante->membro_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
			$acompanhante = Acompanhante::find($id);

			if(!ManipulaImagem::deletaImagemNoServidor($acompanhante->alvara_SEMOB)){
					$request->session()->flash('message', 'Arquivo apagado! Porém pode ter ocorrido problemas ao tentar excluir a Imagem no servidor ou não havia imagem correspondente ao registro selecionado.');
			} else {
					$request->session()->flash('message', 'Excluído com sucesso!');
			}

			$acompanhante->delete();
			$request->session()->flash('message', 'Excluído com sucesso!');
			return redirect()->route('membros.show', ['membro' => $acompanhante->membro_id]);
    }

		/*Método para uso de AJAX*/
    public function mudaEstadoAtivoAcompanhante($idAcompanhante)
    {
        $acompanhante = Acompanhante::find($idAcompanhante);
        $acompanhante->ativo = $acompanhante->ativo == 1 ? 0 : 1;
        $acompanhante->save();
        return $acompanhante->ativo;
    }

}
