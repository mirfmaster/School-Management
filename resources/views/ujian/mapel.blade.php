@extends('layouts.app', [
'class' => '',
'elementActive' => 'kelas'
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Nilai Mata Pelajaran</h4>
                    <div class="col">
                        <a href="{{ route('ujian.rapot', $kelas_id) }}">
                            <div class="btn btn-warning pull-right" style="font-size: 12px">Cetak Raport</div>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Nama
                                </th>
                                <th>
                                    KKM
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @forelse($data as $mapel)
                                <tr>
                                    <td>
                                        {{ $mapel->nama_mapel }}
                                    </td>
                                    <td>
                                        {{ $mapel->kkm }}
                                    </td>
                                    <td>
                                        <a href="{{ route('ujian.index', [$kelas_id,$mapel->id]) }}">
                                            <button type="submit" class="btn" style="padding: 5px 6px;font-size:1.7rem">
                                                <i class="nc-icon nc-tile-56 text-primary"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" style="text-align:center">
                                        Data Is Empty
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection