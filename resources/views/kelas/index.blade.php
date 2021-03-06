@extends('layouts.app', [
'class' => '',
'elementActive' => 'kelas'
])

@section('content')
<div class="content">
    <div class="row">
        <a href="{{route('kelas.create')}}">
            <button type="submit" class="btn btn-primary" style="margin: 15px;">Create</button>
        </a>
    </div>
    <div class="row">
        @forelse($data as $kelas)
        <div class="col-lg-3 col-md-4 col-sm-4">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-mobile text-danger"></i>
                            </div>
                            {{ $kelas->kode_kelas }}
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Jumlah Murid</p>
                                <p class="card-title">{{ $kelas->murid()->count() }}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <div class="row flex-row justify-around">
                            <a href="{{route('murid.index', $kelas->id) }}">
                                <button type="submit" class="btn disflex" style="padding: 5px 6px;font-size:1.7rem">
                                    <i class="nc-icon nc-badge text-info"></i>
                                </button>
                            </a>
                            <a href="{{ route('kelas.edit', $kelas->id) }}">
                                <button type="submit" class="btn disflex" style="padding: 5px 6px;font-size:1.7rem">
                                    <i class="nc-icon nc-settings text-warning"></i>
                                </button>
                            </a>
                            <button type="submit" class="btn disflex" style="padding: 5px 6px;font-size:1.7rem" onclick="del(`{{ url('kelas') }}`, {{$kelas->id}} )">
                                <i class="nc-icon nc-simple-remove text-danger"></i>
                            </button>
                        </div>
                        <div class="row flex-row justify-around" style="margin-top:10px">
                            <a href="{{url('ujian/'. $kelas->id .'/mapel') }}">
                                <button type="submit" class="btn disflex">
                                    NILAI
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-lg-3 col-md-4 col-sm-4">
            <div class="card card-stats">
                <div class="card-body ">
                    <p class="card-title">We Dont found any data
                        <p>
                </div>
            </div>
        </div>
        @endforelse
    </div>
    <!-- <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Users Behavior</h5>
                        <p class="card-category">24 Hours performance</p>
                    </div>
                    <div class="card-body ">
                        <canvas id=chartHours width="400" height="100"></canvas>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Email Statistics</h5>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-body ">
                        <canvas id="chartEmail"></canvas>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-primary"></i> Opened
                            <i class="fa fa-circle text-warning"></i> Read
                            <i class="fa fa-circle text-danger"></i> Deleted
                            <i class="fa fa-circle text-gray"></i> Unopened
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar"></i> Number of emails sent
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-title">NASDAQ: AAPL</h5>
                        <p class="card-category">Line Chart with Points</p>
                    </div>
                    <div class="card-body">
                        <canvas id="speedChart" width="400" height="100"></canvas>
                    </div>
                    <div class="card-footer">
                        <div class="chart-legend">
                            <i class="fa fa-circle text-info"></i> Tesla Model S
                            <i class="fa fa-circle text-warning"></i> BMW 5 Series
                        </div>
                        <hr />
                        <div class="card-stats">
                            <i class="fa fa-check"></i> Data information certified
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
</div>
@endsection