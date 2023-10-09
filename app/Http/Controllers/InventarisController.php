<?php

namespace App\Http\Controllers;

use App\Inventaris;
use Illuminate\Http\Request;
use DataTables;
use DB;
use PDF;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventaris.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventaris = new Inventaris();
        return view('inventaris.form', compact('inventaris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_inventaris'   => 'required|string',
            'kondisi'           => 'required|string',
            'keterangan'        => 'required|string',
            'jumlah'            => 'required|string',
            'jenis_id'          => 'required|string|max:10',
            'tanggal_register'  => 'required|date',
            'ruang_id'          => 'required|string|max:10',
            'kode_inventaris'   => 'required|string',
            'users_id'          => 'required|string|max:10'
        ]);
        $inventaris = Inventaris::create($request->all());
        return $inventaris;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('inventaris.form', compact('inventaris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_inventaris'   => 'required|string',
            'kondisi'           => 'required|string',
            'keterangan'        => 'required|string',
            'jumlah'            => 'required|string',
            'jenis_id'          => 'required|string|max:10',
            'tanggal_register'  => 'required|date',
            'ruang_id'          => 'required|string|max:10',
            'kode_inventaris'   => 'required|string',
            'users_id'          => 'required|string|max:10'
        ]);
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();
    }
    public function dataTable()
    {
        $inventaris = Inventaris::with('jenis','ruang','users');
            return DataTables::of($inventaris)
                ->addColumn('action', function ($inventaris){
                    return view('inventaris._action',[
                        'inventaris'  => $inventaris,
                        'url_edit'    => route('inventaris.edit', $inventaris->id),
                        'url_destroy' => route('inventaris.destroy', $inventaris->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
    }

    public function loadJenis(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('jenis')->select('id','nama_jenis')->where('nama_jenis', 'LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    }
    public function loadRuang(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('ruang')->select('id','nama_ruang')->where('nama_ruang','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    }
    public function loadUsers(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('users')->select('id','name')->where('name','LIKE','%'.$cari.'%')->get();
            return response()->json($data);
        }
    }
}
