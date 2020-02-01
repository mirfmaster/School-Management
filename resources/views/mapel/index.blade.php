@extends('layouts.app', [
'class' => '',
'elementActive' => 'mapel'
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Data Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    <a href="{{url('mapel/create/') }}">
                        <div class="btn btn-primary" style="float:right">Tambah</div>
                    </a>
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
                                        <a href="{{ route('mapel.edit', $mapel->id) }}">
                                            <button type="submit" class="btn" style="padding: 5px 6px;font-size:1.7rem">
                                                <i class="nc-icon nc-settings text-warning"></i>
                                            </button>
                                        </a>
                                        <button type="submit" class="btn" style="padding: 5px 6px;font-size:1.7rem" onclick="del(`{{ url('mapel') }}`, {{$mapel->id}} )">
                                            <i class="nc-icon nc-simple-remove text-danger"></i>
                                        </button>
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