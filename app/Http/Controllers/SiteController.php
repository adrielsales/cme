<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Banner;
use App\Escola;
use App\Message;
use App\Membro;
use App\Acompanhante;

class SiteController extends Controller
{
    public function index()
    {
    	$escolas = Escola::where('ativo','=', 1)->orderBy('nome','asc')->get();
    	$banners = Banner::where('ativo','=', 1)
								->where('tipo','=','Slide')->orderBy('posicao','asc')->get();
    	$mensagens = Message::where('ativo','=', 1)
						    ->where('publicar', '=', 1)
					    	->orderBy('id','asc')->get();

    	$patrocinadores_globais = Banner::where('ativo','=', 1)->where('tipo','=','Patrocinador')->orderBy('posicao','asc')->get();
        return view('site.index', compact('banners', 'escolas', 'patrocinadores_globais', 'mensagens'));
        // phpinfo();
    }

    public function contactForm()
    {
    	return view("site.contactForm");
    }

    public function storeMessage(Request $request)
    {
    	Message::create($request->all());
        $request->session()->flash('message', 'Obrigado por entrar em contato conosco! Juntos iremos construir um transporte escolar com qualidade e segurança para a nossa cidade.');
        return redirect('contato');
    }

    public function listarEscolas()
    {
    	$escolas = Escola::where('ativo','=', 1)->orderBy('nome','asc')->get();
    	return view('site.escolas', compact('escolas'));
    }

    public function membrosDaEscola($idEscola)
    {
    	$escola = Escola::find($idEscola);
    	$nomeDaEscola = $escola->nome;
    	$membros = $escola->membros;
    	return view('site.membros-de-uma-escola', compact('membros', 'nomeDaEscola'));
    }

    public function detalhesDoMembro($idMembro)
    {
    	$membro = Membro::find($idMembro);
    	return view('site.detalhes-do-membro', compact('membro'));
    }

    public function equipe()
    {
        $membros = Membro::where('ativo','=', 1)->orderBy('nome','asc')->get();
        return view('site.equipe', compact('membros'));
    }

    public function sobre()
    {
        $acompanhantes = Acompanhante::where('ativo','=', 1)->get();
        $membros = Membro::where('ativo','=', 1)->orderBy('nome')->get();

        $membrosEAcompanhantes = array_collapse([$acompanhantes, $membros]);

        return view('site.sobre', compact('membrosEAcompanhantes'));
    }

}
