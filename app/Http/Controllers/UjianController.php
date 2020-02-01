<?php

namespace App\Http\Controllers;

use App\Mapel;
use App\Murid;
use App\Ujian;
use PDF;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kelas_id, $mapel_id)
    {
        $data = Ujian::where('kelas_id', $kelas_id)->where('mapel_id', $mapel_id)->with(['kelas', 'murid', 'mapel'])->get();

        return view("ujian.index", compact([
            'data', 'kelas_id', 'mapel_id'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function mapel($kelas_id)
    {
        $data = Mapel::all();

        return view("ujian.mapel", compact(['data', 'kelas_id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function edit(Ujian $ujian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kelas_id)
    {
        $data = Ujian::where('kelas_id', $kelas_id)->where('mapel_id', $request->mapel_id)->get();
        // dd($data, $request->all());
        foreach ($data as $key => $val) {
            $val->semester1 = $request->semester1[$key];
            $val->semester2 = $request->semester2[$key];
            $val->save();
        }
        return redirect()->back()->with("success", "Data berhasil di ubah!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ujian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function rapot($kelas_id)
    {

        $data = Murid::where('kelas_id', $kelas_id)->with(['kelas', 'ujians.mapel'])->get();

        $pdf = PDF::loadView('pdf', compact('data'));
        return $pdf->stream('reports.pdf');
    }
}
