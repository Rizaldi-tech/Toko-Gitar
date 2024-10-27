<?php

namespace App\Http\Controllers;

use App\Models\Jam; 

use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

class JamController extends Controller
{
    public function index() : View
    {
        $Jams = Jam::latest()->paginate(10);

        return view('Jams.index', compact('Jams'));
    }
    public function create(): View
    {
        return view('Jams.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Gambar'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'Merek'         => 'required|min:1',
            'Nama'   => 'required|min:1',
            'Stok'         => 'required|numeric',
            'Harga'         => 'required|integer|min:0'
        ]);

        $Gambar = $request->file('Gambar');
        $Gambar->storeAs('public/jams', $Gambar->hashName());

        //create product
        Jam::create([
            'Gambar'         => $Gambar->hashName(),
            'Merek'         => $request->Merek,
            'Nama'   => $request->Nama,
            'Stok'         => $request->Stok,
            'Harga'         => $request->Harga
        ]);

        return redirect()->route('Jams.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get product by ID
        $Jam = Jam::findOrFail($id);

        //render view with product
        return view('Jams.show', compact('Jam'));
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
        $Jam = Jam::findOrFail($id);

        //render view with product
        return view('Jams.edit', compact('Jam'));
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
        //validate form
        $request->validate([
            'Gambar'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'Merek'         => 'required|min:1',
            'Nama'   => 'required|min:1',
            'Stok'         => 'required|numeric',
            'Harga'         => 'required|integer|min:0'
        ]);

        //get product by ID
        $Jam = Jam::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $Gambar = $request->file('Gambar');
            $Gambar->storeAs('public/jams', $Gambar->hashName());

            //delete old image
            Storage::delete('public/jams/'.$Jam->Gambar);

            //update product with new image
            $Jam->update([
                'Gambar'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'Merek'         => 'required|min:1',
                'Nama'   => 'required|min:1',
                'Stok'         => 'required|numeric',
                'Harga'         => 'required|integer|min:0'
                ]);

        } else {

            //update product without image
            $Jam->update([
                'Merek'         => 'required|min:1',
                'Nama'   => 'required|min:1',
                'Stok'         => 'required|numeric',
                'Harga'         => 'required|integer|min:0'
                ]);
        }

        //redirect to index
        return redirect()->route('Jams.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $Jam = Jam::findOrFail($id);

        //delete image
        Storage::delete('public/Jam/'. $Jam->Gambar);

        //delete product
        $Jam->delete();

        //redirect to index
        return redirect()->route('Jams.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}