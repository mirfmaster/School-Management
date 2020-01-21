<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Murid;
use App\Ujian;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mapel::all();

        return view("mapel.index", compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Mapel;
        return view("mapel.form", compact(['data']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Mapel;
        $data->nama_mapel = $request->nama_mapel;
        $data->kkm = $request->kkm;
        try {
            $data->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Terjadi error");
        }

        $murids = Murid::all();
        foreach ($murids as $murid) {
            $ujian = new Ujian;
            $ujian->murid_id = $murid->id;
            $ujian->kelas_id = $murid->kelas_id;
            $ujian->mapel_id = $data->id;
            $ujian->semester1 = 0;
            $ujian->semester2 = 0;
            $ujian->save();
        }

        return redirect()->route('mapel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Mapel::findOrFail($id);

        // $murids = Murid::all();
        // foreach ($murids as $murid) {
        //     $ujianExist = Ujian::where(['murid_id' => $murid->id])->count();
        //     if ($ujianExist == 0) {
        //         $ujian = new Ujian;
        //         $ujian->murid_id = $murid->id;
        //         $ujian->mapel_id = $data->id;
        //         $ujian->semester1 = 0;
        //         $ujian->semester2 = 0;
        //         $ujian->save();
        //     }
        // }

        return view("mapel.form", compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Mapel::findOrFail($id);
        $data->nama_mapel = $request->nama_mapel;
        $data->kkm = $request->kkm;
        $data->save();

        return redirect()->route('mapel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Mapel::destroy($id)) {
            return 1;
        }
        return 0;
    }
}
