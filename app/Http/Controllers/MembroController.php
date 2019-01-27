<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MembroRequest;
use App\Http\Requests\AcompanhanteRequest;
use App\Http\Requests\PatrocinioRequest;
use App\Http\Requests\ContatoRequest;

use App\ManipulaImagem\ManipulaImagem;

use App\Membro;
use App\Acompanhante;
use App\Patrocinio;
use App\Icon;
use App\Contato;
use App\Bairro;
use App\Escola;

class MembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
				$todosOsMembrosNoSistema = Membro::all();
				$membros = Membro::query()->paginate(50);
        return view('membros.index', compact('membros', 'todosOsMembrosNoSistema'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("membros.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembroRequest $request)
    {
        $nomeFotoParaBD = "";
        $nomeDocumentoParaBD = "";
				$nomeCertificadoParaBD = "";

        if($request->hasFile('foto')){
            $imagem = $request->foto;
            $nomeFotoParaBD = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/membros_foto/", 600);
        }

        if($request->hasFile('documento')){
            $imagem = $request->documento;
            $nomeDocumentoParaBD = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/membros_doc/", 600);
        }

        if($request->hasFile('certificado')){
            $imagem = $request->certificado;
            $nomeCertificadoParaBD = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/membros_doc/", 600);
        }

        Membro::create([
            'nome' => $request->nome,
            'certificado' => $nomeCertificadoParaBD,
            'perfil' => $request->perfil,
            'url_video' => $request->url_video,
            'foto' => $nomeFotoParaBD,
            'documento' => $nomeDocumentoParaBD,
            'ativo' => $request->ativo
        ]);

        $url = $request->get('redirect_to', route('membros.index'));
        $request->session()->flash('message', 'Cadastrado com sucesso!');

        return redirect()->to($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Membro $membro)
    {
        return view('membros.show', compact('membro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Membro $membro)
    {
        return view('membros.edit', compact('membro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MembroRequest $request, Membro $membro)
    {
        $membro->fill($request->all());

        if($request->hasFile('foto')){
            $imagem = $request->foto;
            $nomeNovaImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/membros_foto/", 600);

            if ($request->fotoAtual) {
                ManipulaImagem::deletaImagemNoServidor($request->fotoAtual);
            }
            $membro->foto = $nomeNovaImagemParaBancoDeDados;
        } else {
            $membro->foto = $request->fotoAtual;
        }

        if($request->hasFile('documento')){
            $imagem = $request->documento;
            $nomeNovaImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/membros_doc/", 600);

            if ($request->documentoAtual) {
                ManipulaImagem::deletaImagemNoServidor($request->documentoAtual);
            }
            $membro->documento = $nomeNovaImagemParaBancoDeDados;
        } else {
            $membro->documento = $request->documentoAtual;
        }

				if($request->hasFile('certificado')){
            $imagem = $request->certificado;
            $nomeNovaImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/membros_doc/", 600);

            if ($request->certificadoAtual) {
                ManipulaImagem::deletaImagemNoServidor($request->certificadoAtual);
            }
            $membro->certificado = $nomeNovaImagemParaBancoDeDados;
        } else {
            $membro->certificado = $request->certificadoAtual;
        }

        $membro->nome = $request->nome;
        $membro->url_video = $request->url_video;
        $membro->perfil = $request->perfil;
        $membro->ativo = $request->ativo;

        $membro->save();

        $url = $request->get('redirect_to', route('membros.index'));
        $request->session()->flash('message', 'Alterado com sucesso!');

        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Membro $membro)
    {
        if(!ManipulaImagem::deletaImagemNoServidor($membro->foto)){
            $request->session()->flash('message', 'Arquivo apagado! Porém pode ter ocorrido problemas ao tentar excluir a Imagem no servidor ou não havia imagem correspondente ao registro selecionado.');
        } else {
            $request->session()->flash('message', 'Excluído com sucesso!');
        }

        if(isset($membro->foto) || isset($membro->documento)){
            $resultDeleteImageDocumento = ManipulaImagem::deletaImagemNoServidor($membro->documento);
            $resultDeleteImageFoto = ManipulaImagem::deletaImagemNoServidor($membro->foto);

            if($resultDeleteImageFoto && $resultDeleteImageDocumento) {
                $request->session()->flash('message', 'Excluído com sucesso!');
            } else {
                $request->session()->flash('message', 'Arquivo apagado! Porém pode ter ocorrido problemas ao tentar excluir a Imagem no servidor ou não havia imagem correspondente ao registro selecionado.');
            }

        }

        $membro->delete();
        $request->session()->flash('message', 'Excluído com sucesso!');
        return redirect()->route('membros.index');
    }

    /*Método para uso de AJAX*/
    public function mudaEstadoAtivo($idMembro)
    {
        $membro = Membro::find($idMembro);
        $membro->ativo = $membro->ativo == 1 ? 0 : 1;
        $membro->save();
        return $membro->ativo;
    }

    /**
     * --------------------------
     * PATROCÍNIOS DE UM MEMBRO
     * --------------------------
     * */

    public function createPatrocinio($membro_id)
    {
        $membro = Membro::find($membro_id);
        return view('membros.new-patrocinio', compact('membro'));
    }

    public function storePatrocinio(PatrocinioRequest $request)
    {
        $nomeImagemParaBancoDeDados = "";

        if($request->hasFile('logomarca')){
            $imagem = $request->logomarca;
            $nomeImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/patrocinios_membro/", 300);
        }

        Patrocinio::create([
            'nome' => $request->nome,
            'logomarca' => $nomeImagemParaBancoDeDados,
            'ativo' => $request->ativo,
            'membro_id' => $request->membro_id
        ]);

        $request->session()->flash('message', 'Adicionado com sucesso!');
        return redirect()->route('membros.show', ['membro' => $request->membro_id]);
    }

    public function editPatrocinio($idPatrocinio)
    {
        $patrocinio = Patrocinio::find($idPatrocinio);
        $membro = $patrocinio->membro;
        return view('membros.edit-patrocinio', compact('patrocinio', 'membro'));
    }

    public function updatePatrocinio(PatrocinioRequest $request, $idPatrocinio)
    {
        $patrocinio = Patrocinio::find($idPatrocinio);

        if($request->hasFile('logomarca')){
            $imagem = $request->logomarca;
            $nomeNovaImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/patrocinios_membro/", 300);

            if ($request->logomarca_Atual) {
                ManipulaImagem::deletaImagemNoServidor($request->logomarca_Atual);
            }
            $patrocinio->logomarca = $nomeNovaImagemParaBancoDeDados;
        } else {
            $patrocinio->logomarca = $request->logomarca_Atual;
        }

        $patrocinio->nome = $request->nome;
        $patrocinio->ativo = $request->ativo;
        $patrocinio->membro_id = $request->membro_id;

        $patrocinio->save();

        $request->session()->flash('message', 'Patrocínio alterado com sucesso!');
        return redirect()->route('membros.show', ['membro' => $patrocinio->membro_id]);
    }

    public function destroyPatrocinio(Request $request, $idPatrocinio)
    {
        $patrocinio = Patrocinio::find($idPatrocinio);
        if(!ManipulaImagem::deletaImagemNoServidor($patrocinio->alvara_SEMOB)){
            $request->session()->flash('message', 'Arquivo apagado! Porém pode ter ocorrido problemas ao tentar excluir a Imagem no servidor ou não havia imagem correspondente ao registro selecionado.');
        } else {
            $request->session()->flash('message', 'Excluído com sucesso!');
        }

        $patrocinio->delete();
        $request->session()->flash('message', 'Excluído com sucesso!');
        return redirect()->route('membros.show', ['membro' => $patrocinio->membro_id]);
    }

    /*Método para uso de AJAX*/
    public function mudaEstadoAtivoPatrocinio($idPatrocinio)
    {
        $patrocinio = Patrocinio::find($idPatrocinio);
        $patrocinio->ativo = $patrocinio->ativo == 1 ? 0 : 1;
        $patrocinio->save();
        return $patrocinio->ativo;
    }

    /**
     * --------------------------
     * CONTATOS DE UM MEMBRO
     * --------------------------
     * */
    // public function createContato($membro_id)
    // {
    //     $membro = Membro::find($membro_id);
    //     $icons = Icon::orderBy('nome','asc')->pluck('nome','id');
    //     return view("membros.new-contato", compact('membro', 'icons'));
    // }

    // public function storeContato(ContatoRequest $request)
    // {
    //     $contato = Contato::create($request->all());
    //     $request->session()->flash('message', 'Contato cadastrado com sucesso!');
    //     return redirect()->route('membros.show', ['membro' => $contato->membro_id]);
    // }

    public function destroyContato(Request $request, $idContato)
    {
        $contato = Contato::find($idContato);
        $contato->delete();
        $request->session()->flash('message', 'Contato Excluído com sucesso!');
        return redirect()->route('membros.show', ['membro' => $contato->membro_id]);
    }


    /**
     * --------------------------
     * BAIRROS DE UM MEMBRO
     * --------------------------
     * */

    public function createBairro($membro_id){
        $membro = Membro::find($membro_id);
        $bairros = Bairro::orderBy('nome','asc')->pluck('nome','id');
        return view("membros.new-bairro", compact('membro', 'bairros'));
    }

    public function storeBairro(Request $request)
    {
        $membro = Membro::find($request->membro_id);
        $membro->bairros()->attach($request->bairro_id);

        $request->session()->flash('message', 'bairro cadastrado com sucesso!');
        return redirect()->route('membros.show', ['membro' => $request->membro_id]);
    }

    public function desvincularBairro(Request $request, $idMembro, $idBairro)
    {
        $membro = Membro::find($idMembro);
        $membro->bairros()->detach($idBairro);
        $request->session()->flash('message', 'Bairro Excluído com sucesso!');
        return redirect()->route('membros.show', ['membro' => $membro->id]);
    }

    /**
     * --------------------------
     * ESCOLAS DE UM MEMBRO
     * --------------------------
     * */

    public function createEscola($membro_id){
        $membro = Membro::find($membro_id);
        $escolas = Escola::orderBy('nome','asc')->pluck('nome','id');
        return view("membros.new-escola", compact('membro', 'escolas'));
    }

    public function storeEscola(Request $request)
    {
        $membro = Membro::find($request->membro_id);
        $membro->escolas()->attach($request->escola_id);

        $request->session()->flash('message', 'Escola cadastrada com sucesso!');
        return redirect()->route('membros.show', ['membro' => $request->membro_id]);
    }

    // public function desvincularEscola(Request $request, $idMembro, $idEscola)
    // {
    //     dd("aqui");
        // $membro = Membro::find($idMembro);
        // $membro->escolas()->detach($idEscola);
        // $request->session()->flash('message', 'Escola Excluído com sucesso!');
        // return redirect()->route('membros.show', ['membro' => $membro->id]);
    // }

    /*Método para uso de AJAX*/
    public function desvincularEscola($idMembro, $idEscola)
    {
        $membro = Membro::find($idMembro);
        $membro->escolas()->detach($idEscola);
        return "ok";
    }

		/*Método para uso de AJAX*/
    public function apagarDocumento($idMembro)
    {
        $membro = Membro::find($idMembro);
				$membro->documento = null;
        $membro->save();
        return "ok";
    }

}
