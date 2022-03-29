<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ayat;
use App\Models\Surat;


class AyatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ayat::paginate(10);

        return view('ayat.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['title'] = "Tambah Ayat";
        $data['surat'] = Surat::all();

        return view('ayat.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ayat = Ayat::insertGetId([
            "ayat" => $request->get('ayat'),
            "arti" => $request->get('arti'),
            "urutan"=> $request->get('urutan'),
            "halaman" => $request->get('halaman'),
            "juz" => $request->get('juz'),
            "surat_id" => $request->get('surat')
            ]);

        // insert ke table kata_ayat

        return redirect()->route('ayat.index');
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
        $data['ayat'] = Ayat::find($id);
        $data['surat'] = Surat::all();

        
        return view('ayat.edit',$data);
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

        // put validation rule here

        $ayat = Ayat::find($id);

        $ayat->ayat =  $request->get('ayat');
        $ayat->arti = $request->get('arti');
        $ayat->halaman = $request->get('halaman');
        $ayat->urutan = $request->get('urutan');
        $ayat->juz = $request->get('juz');
        $ayat->surat_id = $request->get('surat');
        $ayat->save();

        return redirect()->route('ayat.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ayat = Ayat::find($id);

        $ayat->delete();

        return redirect()->back();
    }
}
