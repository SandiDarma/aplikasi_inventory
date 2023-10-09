<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use DataTables;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jurusan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = new Jurusan();
        return view('jurusan.form', compact('jurusan'));
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
            'kode_jurusan' => 'required|string|max:5|unique:jurusan',
            'nama_jurusan' => 'required|string|max:40'
        ]);
        $jurusan = Jurusan::create($request->all());
        return $jurusan;
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
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.form', compact('jurusan'));
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
            'kode_jurusan' => 'required|string|max:5',
            'nama_jurusan' => 'required|string|max:40' .$id
        ]);
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
    }

    public function dataTable()
    {
        $jurusan = Jurusan::query();
        return DataTables::of($jurusan)
            ->addColumn('action', function ($jurusan) {
                return view('jurusan._action', [
                    'jurusan' => $jurusan,
                    'url_edit' => route('jurusan.edit', $jurusan->id),
                    'url_destroy' => route('jurusan.destroy', $jurusan->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
