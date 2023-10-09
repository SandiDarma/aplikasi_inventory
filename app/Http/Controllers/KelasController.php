<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use DataTables;
use DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kelas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = new Kelas();
        return view('kelas.form', compact('kelas'));
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
            'kode_kelas' => 'required|string|max:10|unique:kelas',
            'nama_kelas' => 'required|string|max:30',
            'jurusan_id' => 'required|string|max:10'
        ]);
        $kelas = Kelas::create($request->all());
        return $kelas;
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
        $kelas = Kelas::findOrFail($id);
        return view('kelas.form', compact('kelas'));
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
            'kode_kelas' => 'required|string|max:10|unique:kelas',
            'nama_kelas' => 'required|string|max:30',
            'jurusan_id' => 'required|string|max:10'
        ]);
        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
    }

    public function dataTable()
    {
        $kelas = Kelas::with('jurusan');
        return DataTables::of($kelas)
            ->addColumn('action', function ($kelas) {
                return view('kelas._action', [
                    'kelas' => $kelas,
                    'url_edit' => route('kelas.edit', $kelas->id),
                    'url_destroy' => route('kelas.destroy', $kelas->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function loadJurusan(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('jurusan')->select('id', 'nama_jurusan')->where('nama_jurusan', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }
    }
}
