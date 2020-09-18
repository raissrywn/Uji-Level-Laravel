<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Makanan;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makanans = Makanan::all();
        return view('makanan/index', compact('makanans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('makanan/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_makanan' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required'
        ]);

        $file = $request->file('foto');

        // // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'image';

        // // upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());

        Makanan::create([
            'nama_makanan' => $request->nama_makanan,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $file->getClientOriginalName()
        ]);

        Makanan::create($request->all());
        return redirect('/makanans')->with('status', 'Data ' . $request->nama_makanan . ' Berhasil Ditambahkan!');
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
    public function edit(Makanan $makanan)
    {
        return view('makanan/edit', compact('makanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Makanan $makanan)
    {
        $request->validate([
            'nama_makanan' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required'
        ]);

        $file = $request->file('foto');

        // // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'image';

        // // upload file
        $file->move($tujuan_upload, $file->getClientOriginalName());

        Makanan::where('id_makanan', $makanan->id_makanan)
            ->update([
                'nama_makanan' => $request->nama_makanan,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'foto' => $file->getClientOriginalName()
            ]);
        return redirect('/makanans')->with('status', 'Data ' . $request->nama_makanan . ' Berhasil Diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Makanan $makanan)
    {
        Makanan::destroy($makanan->id_makanan);
        return redirect('/makanans')->with('statusHapus', 'Data Berhasil Dihapus!');
    }
}
