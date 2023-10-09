<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use DataTables;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
         $pegawai = new Pegawai();
        return view('pegawai.form', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pegawai' => 'required|string|max:50',
            'nip' => 'required|string|unique:pegawai',
            'alamat' => 'required|string'
        ]);
        $pegawai = Pegawai::create($request->all());
        return $pegawai;
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
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.form', compact('pegawai'));
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
        $this->validate($request, [
            'nama_pegawai' => 'required|string',
            'nip' => 'required|string', 
            'alamat' => 'required|string|max:100'.$id
        ]);
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
    }
     public function dataTable()
    {
        $pegawai = Pegawai::query();
        return DataTables::of($pegawai)
            ->addColumn('action', function ($pegawai) {
                return view('pegawai._action', [
                    'pegawai' => $pegawai,
                    'url_edit' => route('pegawai.edit', $pegawai->id),
                    'url_destroy' => route('pegawai.destroy', $pegawai->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
