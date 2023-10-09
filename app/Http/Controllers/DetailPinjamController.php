<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPinjam;
use DataTables;
use DB;

class DetailPinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        return view('detailpinjam.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detailpinjam = new DetailPinjam();
        return view('detailpinjam.form', compact('detailpinjam'));
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
            'inventaris_id' => 'required|string|max:10',
            'jumlah' => 'required|integer'
        ]);
        $detailpinjam = DetailPinjam::create($request->all());
        return $detailpinjam;
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
        $detailpinjam = DetailPinjam::findOrFail($id);
        return view('detailpinjam.form', compact('detailpinjam'));
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
            'inventaris_id' => 'required|string|max:10',
            'jumlah' => 'required|integer'
        ]);
        $detailpinjam = DetailPinjam::findOrFail($id);
        $detailpinjam->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailpinjam = DetailPinjam::findOrFail($id);
        $detailpinjam->delete();
    }

    public function dataTable()
    {
        $detailpinjam = DetailPinjam::with('barang');
        return DataTables::of($detailpinjam)
            ->addColumn('action', function ($detailpinjam) {
                return view('detailpinjam._action', [
                    'detailpinjam' => $detailpinjam,
                    'url_edit' => route('detailpinjam.edit', $detailpinjam->id),
                    'url_destroy' => route('detailpinjam.destroy', $detailpinjam->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function loadInventaris(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('inventaris')->select('id', 'nama_inventaris')->where('nama_inventaris', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }
    }
}
