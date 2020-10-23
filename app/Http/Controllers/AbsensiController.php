<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Absensi;
use App\Http\Requests\AbsensiRequest;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.absensi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Absensi();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbsensiRequest $request)
    {
        if (!$request->ajax()) {
            return redirect()->route('absensi.index');
        }

        $input = $request->validated();
        $absensi = new Absensi;
        $absensi->kodemk   = $input['kodemk'];
        $absensi->kelas    = $input['kelas'];
        $absensi->nidn     = $input['nidn'];
        $absensi->hari     = $input['hari'];
        $absensi->tanggal  = $input['tanggal'];
        $absensi->checkin  = $input['checkin'];
        $absensi->checkout = $input['checkout'];
        $absensi->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Absensi berhasil ditambahkan.',
            'data'    => $absensi,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (!$request->ajax()) {
            return redirect()->route('absensi.index');
        }

        $absensi = Absensi::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Absensi berhasil ditemukan.',
            'data'    => $absensi,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // DON'T TOUCH THIS FUNC
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AbsensiRequest $request, $id)
    {
        if (!$request->ajax()) {
            return redirect()->route('absensi.index');
        }

        $input = $request->validated();

        $absensi = Absensi::findOrFail($id);

        $absensi->kodemk   = $input['kodemk'];
        $absensi->kelas    = $input['kelas'];
        $absensi->nidn     = $input['nidn'];
        $absensi->hari     = $input['hari'];
        $absensi->tanggal  = $input['tanggal'];
        $absensi->checkin  = $input['checkin'];
        $absensi->checkout = $input['checkout'];
        $absensi->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Absensi berhasil diubah.',
            'data'    => $absensi,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!$request->ajax()) {
            return redirect()->route('absensi.index');
        }

        $absensi = Absensi::findOrFail($id);
        $absensi->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Absensi berhasil dihapus.',
            'data'    => $absensi,
        ], 200);
    }
    public function dataTable()
    {
        $model = Absensi::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('absensi.show', $model->id),
                    'url_edit' => route('absensi.edit', $model->id),
                    'url_destroy' => route('absensi.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
