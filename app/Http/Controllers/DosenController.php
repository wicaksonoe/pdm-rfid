<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mdosens;
use Yajra\DataTables\Facades\DataTables;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.dosen');
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
    public function store(Request $request)
    {
        /**
         * // TODO: tole - buatin function store. cek request is ajax > validation > store > return json (format dibawah)
         * [
         *      'success': true,
         *      'message': 'Data berhasil ditambahkan',
         *      'data': (stored data),
         * ]
         */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         * // TODO: tole - buatin function show single data. cek request is ajax > get > return json (format dibawah)
         * yang sekarang di comment boleh, dihapus juga gapapa
         * [
         *      'success': true,
         *      'message': 'Data berhasil didapatkan',
         *      'data': (finded data),
         * ]
         */

        $model = Mdosens::findOrFail($id);
        return view ('layouts.show_dosen',compact('model'));
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
    public function update(Request $request, $id)
    {
        /**
         * // TODO: tole - buatin function update. cek request is ajax > validation > update > return json (format dibawah)
         * [
         *      'success': true,
         *      'message': 'Data berhasil diubah',
         *      'data': (updated data),
         * ]
         */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         * // TODO: tole - buatin function delete. cek request is ajax > delete > return json (format dibawah)
         * [
         *      'success': true,
         *      'message': 'Data berhasil dihapus',
         *      'data': null,
         * ]
         */

        $model = Mdosens::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Mdosens::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('dosen.show', $model->id),
                    'url_edit' => route('dosen.edit', $model->id),
                    'url_destroy' => route('dosen.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
