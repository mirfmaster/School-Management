<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Rapot Siswa</title>

<body>
  <style type="text/css">
    .tg {
      border-collapse: collapse;
      border-spacing: 0;
      border-color: #ccc;
      width: 100%;
    }

    .tg td {
      font-family: Arial;
      font-size: 12px;
      padding: 10px 5px;
      border-style: solid;
      border-width: 1px;
      overflow: hidden;
      word-break: normal;
      border-color: #ccc;
      color: #333;
      background-color: #fff;
    }

    .tg th {
      font-family: Arial;
      font-size: 14px;
      font-weight: normal;
      padding: 10px 5px;
      border-style: solid;
      border-width: 1px;
      overflow: hidden;
      word-break: normal;
      border-color: #ccc;
      color: #333;
      background-color: #f0f0f0;
    }

    .tg .tg-3wr7 {
      font-weight: bold;
      font-size: 12px;
      font-family: "Arial", Helvetica, sans-serif !important;
      ;
      text-align: center
    }

    .tg .tg-ti5e {
      font-size: 10px;
      font-family: "Arial", Helvetica, sans-serif !important;
      ;
      text-align: center
    }

    .tg .tg-rv4w {
      font-size: 10px;
      font-family: "Arial", Helvetica, sans-serif !important;
    }

    .page-break {
      page-break-after: always;
    }
  </style>

  @foreach($data as $murid)
  <div style="font-family:Arial; font-size:12px;">
    <center>
      <table style="max-width:400px;margin:0 auto">
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td>{{$murid->nama}}</td>
        </tr>
        <tr>
          <td>Kelas</td>
          <td>:</td>
          <td>{{$murid->kelas->kode_kelas}}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td>{{$murid->alamat}}</td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
    </center>
  </div>
  <br>
  <table class="tg" style="width:80%;margin-left:auto;margin-right:auto">
    <thead>
      <tr>
        <th class="tg-3wr7" rowspan=2>No<br></th>
        <th class="tg-3wr7" rowspan=2>Mata Pelajaran<br></th>
        <th class="tg-3wr7" rowspan=2>KKM<br></th>
        <th class="tg-3wr7" colspan=2>Nilai<br></th>
      </tr>
      <tr>
        <th class="tg-3wr7">Semester 1<br></th>
        <th class="tg-3wr7">Semester 2<br></th>
      </tr>
    </thead>
    <tbody>
      @php($no = 1)
      @foreach($murid->ujians as $ujian)
      <tr align="center">
        <td>{{ $no }}</td>
        <td>{{ $ujian->mapel->nama_mapel }}</td>
        <td>{{ $ujian->mapel->kkm }}</td>
        <td>{{ $ujian->semester1 }}</td>
        <td>{{ $ujian->semester2 }}</td>
      </tr>
      @php($no++)
      @endforeach
    </tbody>
  </table>
  <div class="page-break"></div>
  @endforeach
</body>
</head>

</html>