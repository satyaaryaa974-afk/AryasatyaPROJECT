<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bangunan;

class BangunanController extends Controller
{
    public function index(){
        $bangunans = Bangunan::paginate(25);
        return view('bangunan.index', compact('bangunans'));
    }

    public function create()
    {
        return view('bangunan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string',
            'luas_kamar' => 'required|numeric',
            'jenis_kamar' => 'required|in:campuran,laki-laki,perempuan',
            'is_full' => 'required|boolean',
            'harga' => 'required|integer',
        ]);

        Bangunan::create($request->all());

        return redirect()->route('bangunan.index')->with('success', 'Data Kostan berhasil ditambahkan.');
    }

    public function show(Bangunan $bangunan)
    {
        return view('bangunan.show', compact('bangunan'));
    }

    public function edit(Bangunan $bangunan)
    {
        return view('bangunan.edit', compact('bangunan'));
    }

    public function update(Request $request, Bangunan $bangunan)
    {
        // Mendukung update seluruh data (PUT) maupun sebagian (PATCH)
        $rules = [
            'alamat' => 'sometimes|required|string',
            'luas_kamar' => 'sometimes|required|numeric',
            'jenis_kamar' => 'sometimes|required|in:campuran,laki-laki,perempuan',
            'is_full' => 'sometimes|required|boolean',
            'harga' => 'sometimes|required|integer',
        ];

        $request->validate($rules);

        $bangunan->update($request->all());

        return redirect()->route('bangunan.index')->with('success', 'Data Kostan berhasil diperbarui.');
    }

    public function destroy(Bangunan $bangunan)
    {
        $bangunan->delete();

        return redirect()->route('bangunan.index')->with('success', 'Data Kostan berhasil dihapus.');
    }
}
