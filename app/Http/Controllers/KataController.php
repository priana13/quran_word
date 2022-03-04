<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kata;
use App\Models\KataAyat;


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

        return view('kata.add', compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        // dd($data);

        $kata = Kata::insertGetId([
                "kata" => $request->get('kata'),
                "arti" => $request->get('arti')
                ]);

            
        KataAyat::insert([
            "kata_id" => $kata,
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
        return "ini adalah halaman detail dengan id" . $id;
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

        return view('kata.edit', compact(['title', 'kata']));
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
        $kata = Kata::find($id);
        $kata->delete();

        return redirect()->back();

    }
}
