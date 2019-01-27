<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EscolaRequest;

use App\ManipulaImagem\ManipulaImagem;

use App\Escola;

class EscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escolas = Escola::orderBy('nome','asc')->paginate(25);
        return view('escolas.index', compact('escolas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("escolas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ContatoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EscolaRequest $request)
    {
        $nomeImagemParaBancoDeDados = "";

        if($request->hasFile('logomarca')){
            $imagem = $request->logomarca;
            $nomeImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/escolas/", 200);
        }

        Escola::create([
            'nome' => $request->nome,
            'logomarca' => $nomeImagemParaBancoDeDados,
            'endereco' => $request->endereco,
            'ativo' => $request->ativo
        ]);

        $url = $request->get('redirect_to', route('escolas.index'));
        $request->session()->flash('message', 'Cadastrado com sucesso!');

        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Escola $escola)
    {
        return view('escolas.edit', compact('escola'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EscolaRequest $request, Escola $escola)
    {

        if($request->hasFile('logomarca')){
            $imagem = $request->logomarca;
            $nomeNovaImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/escolas/", 200);

            if ($request->logomarcaAtual) {
                ManipulaImagem::deletaImagemNoServidor($request->logomarcaAtual);
            }
            $escola->logomarca = $nomeNovaImagemParaBancoDeDados;
        } else {
            $escola->logomarca = $request->logomarcaAtual;
        }

        $escola->nome = $request->nome;
        $escola->endereco = $request->endereco;
        $escola->ativo = $request->ativo;

        $escola->save();
        $url = $request->get('redirect_to', route('escolas.index'));
        $request->session()->flash('message', 'Alterado com sucesso!');

        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Escola $escola)
    {
        if(!ManipulaImagem::deletaImagemNoServidor($escola->logomarca)){
            $request->session()->flash('message', 'Arquivo apagado! Porém pode ter ocorrido problemas ao tentar excluir a Imagem no servidor ou não havia imagem correspondente ao registro selecionado.');
        } else {
            $request->session()->flash('message', 'Excluído com sucesso!');
        }

        $escola->delete();
        return redirect()->route('escolas.index');
    }

    /*Método para uso de AJAX*/
    public function mudaEstadoAtivo($idEscola)
    {
        $escola = Escola::find($idEscola);
        $escola->ativo = $escola->ativo == 1 ? 0 : 1;
        $escola->save();
        return $escola->ativo;
    }
}
