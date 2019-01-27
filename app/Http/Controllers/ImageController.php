<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;

use App\ManipulaImagem\ManipulaImagem;

use Validator;

use App\Image;
use App\Carro;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($idCarro)
    {
        $carro = Carro::find($idCarro);
        return view("images.create", compact('carro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('imagens')){
            $imagens = $request->imagens;

            $imagensRegras = [
                'imagem' => 'image|dimensions:min_width=400|mimes:jpeg,jpg,png,bmp,gif,JPG,JPEG'
            ];

            foreach ($imagens as $img) {
                $arrayDeImagens = ['imagem' => $img];
                $imageValidator = Validator::make($arrayDeImagens, $imagensRegras);
                if ($imageValidator->fails()) {
                    return redirect()->route('images.form', ['carro_id' => $request->carro_id])
                                ->withErrors($imageValidator)
                                ->withInput();
                }
            }

            foreach ($imagens as $imagem) {
                $nomeImagemParaBD = ManipulaImagem::salvaImagemRedimensionando($imagem, "public/uploads/carros_imagens/", 500);
                $imagem = Image::create([
                    'tipo' => $request->tipo,
                    'imagem' => $nomeImagemParaBD,
                    'titulo' => $request->titulo,
                    'descricao' => $request->descricao,
                    'carro_id' => $request->carro_id
                ]);

                $imagem->save();
            }

            $carro = Carro::find($imagem->carro_id);

            $request->session()->flash('message', 'Imagens cadastradas com sucesso!');
            return redirect()->route('carros.show', ['carro' => $carro]);
        }

        $request->session()->flash('message_error', 'O envio de Imagens é obrigatório!');
        return redirect()->route('images.form', ['carro_id' => $request->carro_id]);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        /*Método para uso de AJAX*/
    public function deletarImagem($idImagem)
    {
        $imagem = Image::find($idImagem);
        $imagem->delete();
        return Response::json($imagem->titulo);
    }
}
