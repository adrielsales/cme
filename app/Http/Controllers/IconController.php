<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IconRequest;

use App\Icon;

class IconController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icons = Icon::query()->orderBy('nome','asc')->paginate(50);
        return view('icons.index', compact('icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("icons.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\IconRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IconRequest $request)
    {
        Icon::create($request->all());
        $url = $request->get('redirect_to', route('icons.index'));
        $request->session()->flash('message', 'Cadastrado com sucesso!');

        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Icon $icon)
    {
        return view('icons.edit', compact('icon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IconRequest $request, Icon $icon)
    {
        $icon->fill($request->all());
        $icon->save();
        $url = $request->get('redirect_to', route('icons.index'));
        $request->session()->flash('message', 'Alterado com sucesso!');

        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Icon $icon)
    {
        $icon->delete();
        $request->session()->flash('message', 'Excluído com sucesso!');
        return redirect()->route('icons.index');
    }
}
