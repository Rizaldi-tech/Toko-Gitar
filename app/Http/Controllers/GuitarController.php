<?php

namespace App\Http\Controllers;

use App\Models\Guitar; 

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

class GuitarController extends Controller
{
    public function index() : View
    {
        $guitars = Guitar::latest()->paginate(10);

        return view('guitars.index', compact('guitars'));
    }
    public function create(): View
    {
        return view('guitars.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama'   => 'required|min:1',
            'merek'         => 'required|min:1',
            'deskripsi'         => 'required|min:0',
            'harga'         => 'required|integer|min:0'
        ]);

        //create guitar
        Guitar::create([
            'nama'   => $request->nama,
            'merek'         => $request->merek,
            'deskripsi'         => $request->deskripsi,
            'harga'         => $request->harga
        ]);

        return redirect()->route('guitars.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get guitar by ID
        $guitar = guitar::findOrFail($id);

        //render view with product
        return view('guitars.show', compact('guitar'));
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get product by ID
        $guitar = Guitar::findOrFail($id);

        //render view with product
        return view('guitars.edit', compact('guitar'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'nama' => 'required|min:1',
            'merek' => 'required|min:1',
            'deskripsi' => 'required|min:1',
            'harga' => 'required|integer|min:0'
        ]);
    
        // Ambil guitar berdasarkan ID
        $guitar = Guitar::findOrFail($id);

        $guitar->update([
            'nama'   => $request->nama,
            'merek'         => $request->merek,
            'deskripsi'         => $request->deskripsi,
            'harga'         => $request->harga
        ]);
        // Redirect ke halaman index
        return redirect()->route('guitars.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
        
    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get guitar by ID
        $guitar = Guitar::findOrFail($id);

        //delete guitar
        $guitar->delete();

        //redirect to index
        return redirect()->route('guitars.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}