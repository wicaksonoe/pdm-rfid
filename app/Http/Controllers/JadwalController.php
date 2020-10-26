<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\JadwalRequest;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.jadwal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Jadwal();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalRequest $request)
    {
        if (!$request->ajax()) {
            return redirect()->route('jadwal.index');
        }

        $input = $request->validated();
        $jadwal = new Jadwal;
        $jadwal->kodemk    = $input['kodemk'];
        $jadwal->kelas     = $input['kelas'];
        $jadwal->hari      = $input['hari'];
        $jadwal->kode_hari = $input['kode_hari'];
        $jadwal->jam_in    = $input['jam_in'];
        $jadwal->jam_out   = $input['jam_out'];
        $jadwal->nidn      = $input['nidn'];
        $jadwal->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Jadwal berhasil ditambahkan.',
            'data'    => $jadwal,
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
            return redirect()->route('jadwal.index');
        }

        $jadwal = Jadwal::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Data Jadwal berhasil ditemukan.',
            'data'    => $jadwal,
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
    public function update(JadwalRequest $request, $id)
    {
        if (!$request->ajax()) {
            return redirect()->route('jadwal.index');
        }

        $input = $request->validated();
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->kodemk    = $input['kodemk'];
        $jadwal->kelas     = $input['kelas'];
        $jadwal->hari      = $input['hari'];
        $jadwal->kode_hari = $input['kode_hari'];
        $jadwal->jam_in    = $input['jam_in'];
        $jadwal->jam_out   = $input['jam_out'];
        $jadwal->nidn      = $input['nidn'];
        $jadwal->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Jadwal berhasil ditambahkan.',
            'data'    => $jadwal,
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
            return redirect()->route('jadwal.index');
        }

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Jadwal berhasil dihapus.',
            'data'    => $jadwal,
        ], 200);
    }
    public function dataTable()
    {
        $model = Jadwal::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('jadwal.show', $model->id),
                    'url_edit' => route('jadwal.edit', $model->id),
                    'url_destroy' => route('jadwal.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
