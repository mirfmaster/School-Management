@extends('layouts.app', [
'class' => '',
'elementActive' => 'profile'
])

@section('content')
<?php
$action = route('kelas.store');
if ($data->id) {
    $action = route('kelas.update', $data->id);
}
?>
<div class="content">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @if (session('password_status'))
    <div class="alert alert-success" role="alert">
        {{ session('password_status') }}
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
                            <label class="col-md-3 col-form-label">Kode Kelas</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="kode_kelas" class="form-control" placeholder="Kode Kelas" value="{{ $data->kode_kelas }}" required>
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