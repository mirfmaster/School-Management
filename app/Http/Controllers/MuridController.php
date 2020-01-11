<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Murid::with('kelas')->whereHas('kelas', function ($q) use ($id) {
            return $q->where('id', $id);
        })->get();

        return view("murid.index", compact(['data', 'id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = new Murid;
        $kelas = Kelas::all();
        return view("murid.form", compact(['id', 'data', 'kelas']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Murid;
        $data->kelas_id = $request->kelas_id;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jk = $request->jk;
        try {
            $data->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "NIS Harus Unique");
        }

        return redirect()->route('murid.index', $request->kelas_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function show(Murid $murid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Murid::findOrFail($id);
        $kelas = Kelas::all();
        $id = $data->kelas_id;

        return view("murid.form", compact(['id', 'data', 'kelas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Murid::findOrFail($id);
        $data->kelas_id = $request->kelas_id;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->jk = $request->jk;
        try {
            $data->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "NIS Harus Unique");
        }

        return redirect()->route('murid.index', $request->kelas_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Murid::destroy($id)) {
            return 1;
        }
        return 0;
    }
}
