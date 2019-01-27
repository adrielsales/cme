<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CarroRequest;
use App\ManipulaImagem\ManipulaImagem;

use App\Carro;
use App\Membro;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = Carro::query()->paginate(25);
        return view("carros.index", compact('carros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $membros = Membro::orderBy('nome','asc')
                           ->pluck('nome','id');
        return view('carros.create', compact('membros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarroRequest $request)
    {
        $nomeDocumentoParaBD = null;
        $nomeAlvaraParaBD = null;

        if($request->hasFile('documento')){
            $imagemDoc = $request->documento;
            $nomeDocumentoParaBD = ManipulaImagem::salvaImagemRedimensionando($imagemDoc, "public/uploads/carros_docs/", 700);
        }

        if($request->hasFile('alvara_SEMOB')){
            $imagemAlvara = $request->alvara_SEMOB;
            $nomeAlvaraParaBD = ManipulaImagem::salvaImagemRedimensionando($imagemAlvara, "public/uploads/carros_alvara/", 700);
        }

        Carro::create([
            'membro_id' => $request->membro_id,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'documento' => $nomeDocumentoParaBD,
            'alvara_SEMOB' => $nomeAlvaraParaBD,
            'registro_SEMOB' => $request->registro_SEMOB,
            'ativo' => $request->ativo
        ]);

        $url = $request->get('redirect_to', route('carros.index'));
        $request->session()->flash('message', 'Cadastrado com sucesso!');

        return redirect()->to($url);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Carro $carro)
    {
        return view('carros.show', compact('carro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carro $carro)
    {
        $membros = Membro::orderBy('nome','asc')
                           ->pluck('nome','id');
        return view('carros.edit', compact('carro', 'membros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarroRequest $request, Carro $carro)
    {
         if($request->hasFile('documento')){
            $imagem = $request->documento;
            $nomeNovaImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/carros_docs/", 700);

            if ($request->documentoAtual) {
                ManipulaImagem::deletaImagemNoServidor($request->documentoAtual);
            }
            $carro->documento = $nomeNovaImagemParaBancoDeDados;
        } else {
            $carro->documento = $request->documentoAtual;
        }

         if($request->hasFile('alvara_SEMOB')){
            $imagem = $request->alvara_SEMOB;
            $nomeNovaImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/carros_alvara/", 700);

        if ($request->alvara_SEMOBAtual) {
                ManipulaImagem::deletaImagemNoServidor($request->alvara_SEMOBAtual);
            }
            $carro->alvara_SEMOB = $nomeNovaImagemParaBancoDeDados;
        } else {
            $carro->alvara_SEMOB = $request->alvara_SEMOBAtual;
        }

        $carro->membro_id = $request->membro_id;
        $carro->tipo = $request->tipo;
        $carro->descricao = $request->descricao;
        $carro->registro_SEMOB = $request->registro_SEMOB;
        $carro->ativo = $request->ativo;

        $carro->save();
        $url = $request->get('redirect_to', route('carros.edit', compact('carro')));
        $request->session()->flash('message', 'Alterado com sucesso!');

        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Carro $carro)
    {
        if(isset($carro->documento) || isset($carro->alvara_SEMOB)){
            $resultDeleteImageDocumento = ManipulaImagem::deletaImagemNoServidor($carro->documento);
            $resultDeleteImageAlvara = ManipulaImagem::deletaImagemNoServidor($carro->alvara_SEMOB);

            if($resultDeleteImageAlvara && $resultDeleteImageDocumento) {
                $request->session()->flash('message', 'Excluído com sucesso!');
            } else {
                $request->session()->flash('message', 'Arquivo apagado! Porém pode ter ocorrido problemas ao tentar excluir a Imagem no servidor ou não havia imagem correspondente ao registro selecionado.');
            }

        }

        $carro->delete();
        return redirect()->route('carros.index');
    }

    /*Método para uso de AJAX*/
    public function mudaEstadoAtivo($idCarro)
    {
        $carro = Carro::find($idCarro);
        $carro->ativo = $carro->ativo == 1 ? 0 : 1;
        $carro->save();
        return $carro->ativo;
    }

    /**
     * --------------------------
     * IMAGENS DE UM CARRO
     * --------------------------
     * */

      public function addCarro(AcompanhanteRequest $request)
    {
        $nomeImagemParaBancoDeDados = "";

        if($request->hasFile('alvara_SEMOB')){
            $imagem = $request->alvara_SEMOB;
            $nomeImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/acompanhantes/", 700);
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

}
