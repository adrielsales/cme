<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\NoticiaRequest;

use App\ManipulaImagem\ManipulaImagem;

use App\Noticia;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::query()->paginate(25);
        return view('noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticiaRequest $request)
    {
        $nomeImagemParaBD = "";

        if($request->hasFile('capa')){
            $img = $request->capa;
            $capaSize = 580;
            $nomeImagemParaBD = ManipulaImagem::salvaImagemRedimensionando($img, "public/uploads/noticias/", $capaSize);
        }

        Noticia::create([
            'titulo' => $request->titulo,
            'sub_titulo' => $request->sub_titulo,
            'destaque' => (int) $request->destaque,
            'data_para_publicar_destaque' => $this->dataPtBrParaMysql($request->data_para_publicar_destaque),
            'data_de_expiracao_destaque' => $this->dataPtBrParaMysql($request->data_de_expiracao_destaque),
            'texto' => $request->texto,
            'capa' => $nomeImagemParaBD,
            'ativo' => (int) $request->ativo
        ]);

        $url = $request->get('redirect_to', route('noticias.index'));
        $request->session()->flash('message', 'Cadastrado com sucesso!');

        return redirect()->to($url);
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
    public function edit(Noticia $noticia)
    {
        return view('noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoticiaRequest $request, Noticia $noticia)
    {
        if($request->hasFile('capa')){
            $img = $request->capa;
            $capaSize = 580;
            $nomeNovaCapaParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($img, "public/uploads/noticias/", $capaSize);

            if ($request->capaAtual) {
                ManipulaImagem::deletaImagemNoServidor($request->capaAtual);
            }
            $noticia->capa = $nomeNovaCapaParaBancoDeDados;
        } else {
            $noticia->capa = $request->capaAtual;
        }

        $noticia->titulo = $request->titulo;
        $noticia->sub_titulo = $request->sub_titulo;
        $noticia->destaque = (int) $request->destaque;
        $noticia->data_para_publicar_destaque = $request->data_para_publicar_destaque;
        $noticia->data_de_expiracao_destaque = $request->data_de_expiracao_destaque;
        $noticia->texto = $request->texto;
        $noticia->ativo = (int) $request->ativo;

        $noticia->save();
        $url = $request->get('redirect_to', route('noticias.index'));
        $request->session()->flash('message', 'Alterado com sucesso!');

        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Noticia $noticia)
    {
        if(!ManipulaImagem::deletaImagemNoServidor($noticia->capa)){
            $request->session()->flash('message', 'Arquivo apagado! Porém pode ter ocorrido 
            problemas ao tentar excluir a Imagem no servidor ou não havia imagem correspondente ao registro selecionado.');
        } else {
            $request->session()->flash('message', 'Excluído com sucesso!');
        }

        $noticia->delete();
        return redirect()->route('noticias.index');
    }

    /*Método para uso de AJAX*/
    public function mudaEstadoAtivo($idNoticia)
    {
        $noticia = Noticia::find($idNoticia);
        $noticia->ativo = $noticia->ativo == 1 ? 0 : 1;
        $noticia->save();
        return $noticia->ativo;
    }

    /*Método para uso de AJAX*/
    public function mudaEstadoDestaque($idNoticia)
    {
        $noticia = Noticia::find($idNoticia);
        $noticia->destaque = $noticia->destaque == 1 ? 0 : 1;
        $noticia->save();
        return $noticia->destaque;
    }    

    /**
     * Tratamento de Datas
     * 02/08/2019 -> este é o formato atual na view, pois estou usando o calendário do html 5,
     * por isso não precisou usar este helper.
     * 08/02/2019 -> modelo padrão, mas não está sendo utilizado. (no arry será: posições 2-1-0 )
     * 0-1-2 
     */

    private function dataPtBrParaMysql($dataPtBr=null){
        // partes = explode("/", $dataPtBr);
        // return "{$partes[2]}-{$partes[1]}-{$partes[0]}";
    return $dataPtBr;
    }

}
