<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;
use DataTables;
use DB;
use PDF;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        return view('peminjaman.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peminjaman = new Peminjaman();
        return view('peminjaman.form', compact('peminjaman'));
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
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'status' => 'required|string',
            'pegawai_id' => 'required|string|max:10'
        ]);
        $peminjaman = Peminjaman::create($request->all());
        return $peminjaman;
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
        $peminjaman = Peminjaman::findOrFail($id);
        return view('peminjaman.form', compact('peminjaman'));
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
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'status' => 'required|string',
            'pegawai_id' => 'required|string|max:10'
        ]);
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();
    }

    public function dataTable()
    {
        $peminjaman = Peminjaman::with('pegawai');
        return DataTables::of($peminjaman)
            ->addColumn('action', function ($peminjaman) {
                return view('peminjaman._action', [
                    'peminjaman' => $peminjaman,
                    'url_edit' => route('peminjaman.edit', $peminjaman->id),
                    'url_destroy' => route('peminjaman.destroy', $peminjaman->id),
                    'url_generatePDF' => route('report.peminjaman', $peminjaman->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function loadPegawai(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('pegawai')->select('id', 'nama_pegawai')->where('nama_pegawai', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }
    }

    public function generatePDF($id)
    {
        $peminjaman = Peminjaman::find($id);
        $pdf = PDF::loadView('peminjaman.report.peminjaman', compact('peminjaman'))->setPaper('a4','landscape');
        return $pdf->download('laporan peminjaman.pdf');
    }
}
