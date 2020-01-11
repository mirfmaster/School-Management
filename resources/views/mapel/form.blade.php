@extends('layouts.app', [
'class' => '',
'elementActive' => 'profile'
])

@section('content')
<?php
$action = route('murid.store');
if ($data->id) {
    $action = route('murid.update', $data->id);
}
?>
<div class="content">
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        NIS Harus Unique
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <form class="col-md-12" action="{{ $action }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($data->id)
                @method('PUT')
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Form Kelas</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-md-3 col-form-label">Kelas</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <select name="kelas_id" id="kelas_id" class="form-control">
                                        @foreach($kelas as $kel)
                                        @php($selectedKelas = $kel->id == $id ? "selected":"")
                                        <option value="{{$kel->id}}" {{$selectedKelas}}>{{$kel->kode_kelas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">NIS</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="nis" class="form-control" placeholder="NIS" value="{{ $data->nis }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Nama</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $data->nama }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Alamat</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Alamat" name="alamat">{{ $data->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                        <?php $selected = $data->jk == "Wanita" ? "selected" : "" ?>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <select name="jk" id="jk" class="form-control">
                                        <option value="Pria" selected>Pria</option>
                                        <option value="Wanita" {{ $selected }}>Wanita</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info btn-round">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection