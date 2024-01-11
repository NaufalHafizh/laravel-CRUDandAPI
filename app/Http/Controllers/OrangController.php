<?php

namespace App\Http\Controllers;

use App\Models\orang;
use Illuminate\Http\Request;

class OrangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [

            'title' => "Halaman Utama",
            'orang' => orang::paginate(5),
            'new_orang' => orang::all()
        ];

        return view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([

            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'parent' => 'required'
        ]);

        // dd($validate);

        orang::create($validate);

        return redirect('/keluarga')->with('berhasil', "Data berhasil di input ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orang  $orang
     * @return \Illuminate\Http\Response
     */
    public function show(orang $orang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orang  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit(orang $keluarga)
    {
        $data = [

            'title' => "Halaman Edit",
            'old_orang' => $keluarga,
            'orang' => orang::all()
        ];

        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orang  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orang $keluarga)
    {
        $validate = $request->validate([

            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'parent' => 'required'
        ]);

        // dd($validate);

        orang::where('id', $keluarga->id)->update($validate);

        return redirect('/keluarga')->with('berhasil', "Data berhasil di Ubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orang  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(orang $keluarga)
    {
        orang::destroy($keluarga->id);

        return redirect('/keluarga')->with('berhasil', "Data berhasil di Hapus");
    }
}
