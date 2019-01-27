<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        /**
         *  Macros criadas para funcionar como componentes no HTML das views.
        */

        /*----------- erro no campo do formulário ---------*/
        \Form::macro('errorFormField', function($field, $errors){
            if ($errors->has($field)) {
                return view('errors.error_campo_form', compact('field'));
            }
            return null;
        });


        /*------------ form-goups ----------------------*/
        \Html::macro('openFormGroup', function($field = null, $errors = null){
            $hasError = ($field != null and $errors != null and $errors->has($field)) ? ' has-error' : '';
            return "<div class=\"form-group{$hasError}\">";
        });

        \Html::macro('closeFormGroup', function(){
            return "</div>";
        });

        /*------------ Verifica o estado: Ativo ou inativo ----------*/

        \Html::macro('iconeParaEstado', function($estado){
            $iconeDoEstado = $estado == 1
            ? '<span style="color:lawngreen" class="glyphicon glyphicon-ok-sign" aria-hidden="true" title="Ativo"></span>'
            : '<span style="color:salmon" class="glyphicon glyphicon-minus-sign" aria-hidden="true" title="inativo"></span>';
            return $iconeDoEstado;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
