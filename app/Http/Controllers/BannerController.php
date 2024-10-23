<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    // Listar todos os banners e mostrar a view
    public function index()
    {
        $banners = Banner::all();

        return view('home', compact('banners'));
    }

    // Mostrar o formulário para criar um novo banner
    public function create()
    {
        $banners = Banner::all();

        return view('banners', compact('banners'));
    }

    // Armazenar um novo banner
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'plataforma' => 'required|string|max:255',
            'campanha' => 'required|string|max:255',
            'formato' => 'required|string|max:255',
            'empresa' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
        ]);

        Banner::create($request->all());

        return redirect()->route('banners.index')->with('success', 'Banner criado com sucesso!');
    }

    // Mostrar o formulário para editar um banner
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $banners = Banner::all();

        return view('banners', compact('banner', 'banners'));
    }

    // Atualizar um banner existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'string|max:255',
            'plataforma' => 'string|max:255',
            'campanha' => 'string|max:255',
            'formato' => 'string|max:255',
            'empresa' => 'string|max:255',
            'tipo' => 'string|max:255',
        ]);

        $banner = Banner::findOrFail($id);
        $banner->update($request->all());

        return redirect()->route('banners.index')->with('success', 'Banner atualizado com sucesso!');
    }

    // Excluir um banner
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('banners.index')->with('success', 'Banner excluído com sucesso!');
    }
}
