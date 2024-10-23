<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Nette\Utils\FileSystem;

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
    public function store(StoreBannerRequest $request)
    {
        $validated = $request->safe()->except(['midia']);

        // salva a midia em uploads
        $fileName = time().'.'.$request->midia->extension();
        $request->midia->move(public_path('uploads'), $fileName);

        // guarda o nome da midia para usar depois
        $validated['midia'] = $fileName;

        Banner::create($request->all());

        return redirect()->route('banners.index');
    }

    // Mostrar o formulário para editar um banner
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $banners = Banner::all();

        return view('banners', compact('banner', 'banners'));
    }

    // Atualizar um banner existente
    public function update(UpdateBannerRequest $request, $id)
    {
        $validated = $request->safe()->except(['midia']);

        // salva a midia em uploads
        $fileName = time().'.'.$request->midia->extension();
        $request->midia->move(public_path('uploads'), $fileName);

        // guarda o nome da midia para usar depois
        $validated['midia'] = $fileName;

        $banner = Banner::findOrFail($id);
        // remove a midia antiga
        FileSystem::delete(public_path('uploads/'.$banner->caminho_arquivo));

        $banner->update($validated);

        return redirect()->route('banners.index');
    }

    // Excluir um banner
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('banners.index');
    }
}
