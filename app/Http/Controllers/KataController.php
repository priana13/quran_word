<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kata;
use App\Models\KataAyat;
use App\Models\Surat;


class KataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List Kata";
        $data = Kata::paginate(10);


        return view('kata.index',compact(['data','title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Kata";
        $surat = Surat::all()->toArray();

        return view('kata.add', compact(['title' , 'surat']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // tambah validasi di sini 
        
        // cek kata di database
        $cek_kata = Kata::where('kata' , $request->get('kata'))->first();
     
        if($cek_kata){

            $kata_id = $cek_kata->id;

        }else{

            $kata_id = Kata::insertGetId([
                "kata" => $request->get('kata'),
                "arti" => $request->get('arti')
                ]);
        }  
            
        KataAyat::insert([
            "kata_id" => $kata_id,
            "ayat_id" => $request->get('ayat'),
            // "surat_id" => $request->get('surat')
        ]);
        // insert ke table kata_ayat

        return redirect()->route('kata.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kata = Kata::find($id);

        return view('kata.detail' , compact('kata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit Kata";

        $kata = Kata::find($id);

        $surat = Surat::all();

        return view('kata.edit', compact(['title', 'kata' , 'surat']));
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
        $kata = Kata::find($id);

        $kata->kata = $request->get('kata');
        $kata->arti = $request->get('arti');
        $kata->save();

        return redirect(route('kata.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // $kata_ayat = KataAyat::where('kata_id' , $id)->delete();

        $kata = Kata::find($id);
        $kata->delete();

        return redirect()->back();

    }
}
