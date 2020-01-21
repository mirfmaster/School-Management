@extends('layouts.app', [
'class' => '',
'elementActive' => 'kelas'
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil di ubah!
            </div>
            @endif
            <form action="{{route('ujian.update', $kelas_id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Nilai Ujian </h4>
                        <div class="col">
                            <div class="btn btn-warning pull-right" style="font-size: 12px" id="edit" onclick="edit()">Edit</div>
                            <button type="submit" class="btn btn-primary pull-right" style="font-size: 12px; display:none" id="save">Save</button>
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
                                    <th style=" text-align: center">
                                        Semester 1
                                    </th>
                                    <th style=" text-align: center">
                                        Semester 2
                                    </th>
                                </thead>
                                <tbody>
                                    @forelse($data as $ujian)
                                    <tr>
                                        <td>
                                            {{ $ujian->murid->nama }}
                                        </td>
                                        <td>
                                            {{ $ujian->mapel->kkm }}
                                        </td>
                                        <?php
                                        $color1 = $ujian->semester1 > $ujian->mapel->kkm ? "green" : "red";
                                        $color2 = $ujian->semester2 > $ujian->mapel->kkm ? "green" : "red";
                                        ?>
                                        <td style="color: {{ $color1 }}; text-align: center">
                                            <input type="text" name="semester1[]" type="number" class="form-control" placeholder="Nilai Semester 1" value="{{ $ujian->semester1 }}" style="display:none">
                                            <div class="info">
                                                {{ $ujian->semester1 }}
                                            </div>
                                        </td>
                                        <td style="color: {{ $color2 }}; text-align: center">

                                            <input type="text" name="semester2[]" type="number" class="form-control" placeholder="Nilai Semester 2" value="{{ $ujian->semester2 }}" style="display:none">
                                            <div class="info">
                                                {{ $ujian->semester2 }}
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
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const edit = () => {
        $('#edit').hide();
        $('#save').show();
        $('.info').hide();
        $('.form-control').show();
    }
</script>
@endpush