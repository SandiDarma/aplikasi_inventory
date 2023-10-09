<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruang;
use DataTables;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ruang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruang = new Ruang();
        return view('ruang.form', compact('ruang'));
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
            'nama_ruang' => 'required|string|max:100|unique:ruang',
            'kode_ruang' => 'required|integer',
            'keterangan' => 'required|string|max:100'
        ]);
        $ruang = Ruang::create($request->all());
        return $ruang;
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
        $ruang = Ruang::findOrFail($id);
        return view('ruang.form', compact('ruang'));
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
            'nama_ruang' => 'required|string|max:100',
            'kode_ruang' => 'required|integer', 
            'keterangan' => 'required|string|max:100'.$id
        ]);
        $ruang = Ruang::findOrFail($id);
        $ruang->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruang = Ruang::findOrFail($id);
        $ruang->delete();
    }
     public function dataTable()
    {
        $ruang = Ruang::query();
        return DataTables::of($ruang)
            ->addColumn('action', function ($ruang) {
                return view('ruang._action', [
                    'ruang' => $ruang,
                    'url_edit' => route('ruang.edit', $ruang->id),
                    'url_destroy' => route('ruang.destroy', $ruang->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
