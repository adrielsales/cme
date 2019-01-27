<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BannerRequest;

use App\ManipulaImagem\ManipulaImagem;

use App\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::query()->paginate(25);
        return view('banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $nomeImagemParaBD = "";

        if($request->hasFile('imagem')){
            $img = $request->imagem;
            $bannerSize = ($request->tipo === "Slide") ? 1920 : 400;
            $nomeImagemParaBD = ManipulaImagem::salvaImagemRedimensionando($img, "public/uploads/banners/", $bannerSize);
        }

				//dd($request->all());

        Banner::create([
            'titulo' => $request->titulo,
            'sub_titulo' => $request->sub_titulo,
            'posicao' => (int) $request->posicao,
            'tipo' => $request->tipo,
            'exibirTitulos' => false,
            'imagem' => $nomeImagemParaBD,
            'ativo' => $request->ativo
        ]);

        $url = $request->get('redirect_to', route('banners.index'));
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
    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        if($request->hasFile('imagem')){
            $img = $request->imagem;
            $bannerSize = ($request->tipo === "Slide") ? 1920 : 400;
            $nomeNovaImagemParaBancoDeDados = ManipulaImagem::salvaImagemRedimensionando($img, "public/uploads/banners/", $bannerSize);

            if ($request->imagemAtual) {
                ManipulaImagem::deletaImagemNoServidor($request->imagemAtual);
            }
            $banner->imagem = $nomeNovaImagemParaBancoDeDados;
        } else {
            $banner->imagem = $request->imagemAtual;
        }

        $banner->titulo = $request->titulo;
        $banner->sub_titulo = $request->sub_titulo;
        $banner->posicao = $request->posicao;
        $banner->tipo = $request->tipo;
        $banner->exibirTitulos = $request->exibirTitulos;
        $banner->ativo = $request->ativo;

        $banner->save();
        $url = $request->get('redirect_to', route('banners.index'));
        $request->session()->flash('message', 'Alterado com sucesso!');

        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Banner $banner)
    {
        if(!ManipulaImagem::deletaImagemNoServidor($banner->logomarca)){
            $request->session()->flash('message', 'Arquivo apagado! Porém pode ter ocorrido problemas ao tentar excluir a Imagem no servidor ou não havia imagem correspondente ao registro selecionado.');
        } else {
            $request->session()->flash('message', 'Excluído com sucesso!');
        }

        $banner->delete();
        return redirect()->route('banners.index');
    }

    /*Método para uso de AJAX*/
    public function mudaEstadoAtivo($idBanner)
    {
        $banner = Banner::find($idBanner);
        $banner->ativo = $banner->ativo == 1 ? 0 : 1;
        $banner->save();
        return $banner->ativo;
    }
}
