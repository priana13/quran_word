<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Surat;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat = Surat::paginate(10);

        return view('surat.index',compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'urutan_surat' => 'required | numeric',
            'nama_surat' => 'required|string|max:255',
            'nama_surat_latin' => 'required|string|max:255',
            'arti' => 'string|max:100',
            'deskripsi' => 'string',
            'jumlah_ayat' => 'numeric'
        ]);


        $surat = Surat::insertGetId([
            "urutan_surat" => $request->get('urutan_surat'),
            "nama_surat" => $request->get('nama_surat'),
            "nama_surat_latin" => $request->get('nama_surat_latin'),
            "arti" => $request->get('arti'),
            "deskripsi" => $request->get('deskripsi'),
            "jumlah_ayat" => $request->get('jumlah_ayat'),
            ]);

        // insert ke table kata_ayat

        return redirect()->route('surat.index');
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
        $surat = Surat::find($id);

        return view('surat.edit',compact('surat'));
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
        $validated = $request->validate([
            'urutan_surat' => 'required | numeric',
            'nama_surat' => 'required|string|max:255',
            'nama_surat_latin' => 'required|string|max:255',
            'arti' => 'string|max:100',
            'deskripsi' => 'string',
            'jumlah_ayat' => 'numeric'
        ]);


        $surat = Surat::find($id);

        $surat->urutan_surat = $request->urutan_surat;
        $surat->nama_surat = $request->nama_surat;
        $surat->nama_surat_latin = $request->nama_surat_latin;
        $surat->arti = $request->arti;
        $surat->deskripsi = $request->deskripsi;
        $surat->jumlah_ayat = $request->jumlah_ayat;
        $surat->save();

        return redirect()->route('surat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat = Surat::find($id);

        $surat->delete();

        return redirect()->route('surat.index');
    }
}
