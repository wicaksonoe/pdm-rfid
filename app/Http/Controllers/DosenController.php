<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mdosens;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\DosenRequest;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.dosen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Mdosens();
        return view('page.form.formdosen',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DosenRequest $request)
    {
        if (!$request->ajax()) {
            return redirect()->route('dosen.index');
        }

        $input = $request->validated();
        $mdosen = new Mdosens;
        $mdosen->nidn         = $input['nidn'];
        $mdosen->nama         = $input['nama'];
        $mdosen->programstudi = $input['programstudi'];
        $mdosen->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Dosen berhasil ditambahkan.',
            'data'    => $mdosen,
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
            return redirect()->route('dosen.index');
        }

        return Mdosens::findOrFail($id);
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
        $model = Mdosens::findOrFail($id);
        return view('page.form.formdosen',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DosenRequest $request, $id)
    {
        if (!$request->ajax()) {
            return redirect()->route('dosen.index');
        }

        $input = $request->validated();
        $mdosen = Mdosens::findOrFail($id);

        $mdosen->nidn         = $input['nidn'];
        $mdosen->nama         = $input['nama'];
        $mdosen->programstudi = $input['programstudi'];
        $mdosen->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Dosen berhasil diubah.',
            'data'    => $mdosen,
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
            return redirect()->route('dosen.index');
        }

        $mdosen = Mdosens::findOrFail($id);
        $mdosen->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Dosen berhasil dihapus.',
            'data'    => $mdosen,
        ], 200);
    }

    public function dataTable()
    {
        $mataKuliah = Mdosens::query();
        return DataTables::of($mataKuliah)
            ->addColumn('action', function ($mataKuliah) {
                return view('page.dosen._action', [
                    'value' => $mataKuliah->id,
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
