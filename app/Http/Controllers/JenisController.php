<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;
use DataTables;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        return view('jenis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = new Jenis();
        return view('jenis.form', compact('jenis'));
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
            'nama_jenis' => 'required|string|max:100|unique:jenis',
            'kode_jenis' => 'required|integer',
            'keterangan' => 'required|string|max:100'
        ]);
        $jenis = Jenis::create($request->all());
        return $jenis;
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
        $jenis = Jenis::findOrFail($id);
        return view('jenis.form', compact('jenis'));
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
            'nama_jenis' => 'required|string|max:5',
            'kode_jenis' => 'required|integer', 
            'keterangan' => 'required|string|max:100'.$id
        ]);
        $jenis = Jenis::findOrFail($id);
        $jenis->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();
    }
     public function dataTable()
    {
        $jenis = Jenis::query();
        return DataTables::of($jenis)
            ->addColumn('action', function ($jenis) {
                return view('jenis._action',[
                    'jenis' => $jenis,
                    'url_edit' => route('jenis.edit', $jenis->id),
                    'url_destroy' => route('jenis.destroy', $jenis->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
