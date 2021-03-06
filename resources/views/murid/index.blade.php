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
                    <h4 class="card-title"> Data Murid</h4>
                </div>
                <div class="card-body">
                    <div class="col">
                        <div class="btn btn-info pull-left" style="font-size: 12px">Cetak Raport Massal</div>
                        <a href="{{url('murid/create/'. $id) }}">
                            <div class="btn btn-primary pull-right" style="float:right">Tambah</div>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    NIS
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Jenis Kelamin
                                </th>
                                <th>
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @forelse($data as $murid)
                                <tr>
                                    <td>
                                        {{ $murid->nis }}
                                    </td>
                                    <td>
                                        {{ $murid->nama }}
                                    </td>
                                    <td>
                                        {{ $murid->jk }}
                                    </td>
                                    <td width="210px">
                                        <a href="{{ route('murid.edit', $murid->id) }}">
                                            <button type="submit" class="btn" style="padding: 5px 6px;font-size:1.7rem">
                                                <i class="nc-icon nc-settings text-warning"></i>
                                            </button>
                                        </a>
                                        <button type="submit" class="btn" style="padding: 5px 6px;font-size:1.7rem" onclick="del(`{{ url('murid') }}`, {{$murid->id}} )">
                                            <i class="nc-icon nc-simple-remove text-danger"></i>
                                        </button>
                                        <a href="{{ route('ujian.rapot', [$murid->kelas_id, $murid->id]) }}">
                                            <div class="btn btn-info" style="font-size: 12px">Raport</div>
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