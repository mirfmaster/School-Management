@extends('layouts.app', [
'class' => '',
'elementActive' => 'profile'
])

@section('content')
<?php
$action = route('mapel.store');
if ($data->id) {
    $action = route('mapel.update', $data->id);
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
                        <h5 class="title">Form Mata Pelajaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-md-3 col-form-label">Nama Mata Pelajaran</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="nama_mapel" class="form-control" placeholder="Nama Mata Pelajaran" value="{{ $data->nama_mapel }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">KKM</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="kkm" class="form-control" placeholder="KKM" value="{{ $data->kkm }}" required>
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