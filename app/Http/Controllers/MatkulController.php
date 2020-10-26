<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatkulRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Matkul;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.matkul.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\MatkulRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatkulRequest $request)
    {
        // TODO: wicak - sama kaya store di DosenController
        if (!$request->ajax()) {
            return redirect()->route('matkul.index');
        }

        $input = $request->validated();

        $mataKuliah = new Matkul;
        $mataKuliah->kodemk = $input['kodemk'];
        $mataKuliah->namamk = $input['namamk'];
        $mataKuliah->save();

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah berhasil ditambahkan.',
            'data'    => $mataKuliah,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // TODO: wicak - sama kaya show di DosenController
        if (!$request->ajax()) {
            return redirect()->route('matkul.index');
        }

        return Matkul::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\MatkulRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatkulRequest $request, $id)
    {
        // TODO: wicak - sama kaya update di DosenController
        if (!$request->ajax()) {
            return redirect()->route('matkul.index');
        }

        $input = $request->validated();

        $mataKuliah = Matkul::findOrFail($id);
        $mataKuliah->kodemk = $input['kodemk'];
        $mataKuliah->namamk = $input['namamk'];
        $mataKuliah->save();

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah berhasil diubah.',
            'data'    => $mataKuliah,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // TODO: wicak - sama kaya delete di DosenController
        if (!$request->ajax()) {
            return redirect()->route('matkul.index');
        }

        $mataKuliah = Matkul::findOrFail($id);
        $mataKuliah->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah berhasil dihapus.',
            'data'    => $mataKuliah,
        ], 200);
    }

    /**
     * Create datatable
     *
     * @return Yajra\DataTables\Facades\DataTables
     */
    public function dataTable()
    {
        $mataKuliah = Matkul::query();
        return DataTables::of($mataKuliah)
            ->addColumn('action', function ($mataKuliah) {
                return view('page.matkul._action', [
                    'value' => $mataKuliah->id,
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
