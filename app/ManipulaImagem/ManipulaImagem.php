<?php

namespace App\ManipulaImagem;

use Intervention\Image\ImageManagerStatic as Image;

class ManipulaImagem {

	public static function salvaImagemRedimensionando($imagem, $pasta, $largura = null, $altura = null)
    {
        if ($imagem) {
            //mkdir($pasta, 0777);
            $nomeParaImagem = time()."_".snake_case(strtolower($imagem->getClientOriginalName()));

            //upload tamanho normal da imagem.
            $imagem->move($pasta, $nomeParaImagem);

            //upload imagem redimensionada.
            $image = Image::make($pasta.$nomeParaImagem)
                ->resize($largura, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    })->save($pasta.$largura."px_".$nomeParaImagem, 100);
            //deletendo a imagem na memória - liberar espaço
            //$image->destroy();
            //deletando  a imagem na pasta do servidor.
            //isso deve ser melhorado em novas versões.
            //o que acontece aqui é que tenho que salvar a imagem na pasta antes de resimensionar,
            //mas para mim o que importa é a imagem redmensionada
            //por isso deleto a origial.
            self::deletaImagemNoServidor($pasta.$nomeParaImagem);

            return $pasta.$largura."px_".$nomeParaImagem;
        }

        return false;
    }

    public static function deletaImagemNoServidor($caminhoENomeDaImagem){
    	//echo $caminhoENomeDaImagem; die();
    	if (!empty($caminhoENomeDaImagem) && file_exists($caminhoENomeDaImagem)){
			unlink($caminhoENomeDaImagem);
			return true;
		}
		return false;
    }

}
