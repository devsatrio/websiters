<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Tracking</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <div class="row" style="padding-top:25px;">        
        <div class="container">
            <table width='100%' border="0">
                <tr align="center">
                    <td colspan="3">
                        <h2>Laporan Tracking Technical Support</h2>
                    </td>
                </tr>
                <tr align="center">
                    <td><b>Tanggal Cetak</b> : {{date('d-m-Y')}}</td>
                    <td><b>Tanggal</b> : {{Request::segment(3).' Sampai '.Request::segment(4)}}</td>
                    <td><b>Pencetak</b> :{{Auth::user()->nama}}</td>
                </tr>
            </table>
            @php
                $cimg=Request::segment(6);
            @endphp
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal</th>
                            <th>Koordinat</th>
                            <th>Tempat</th>
                            <th>Konsumen</th>
                            <th>Telp Konsumen</th>
                            @if ($cimg=='1')                                
                            <th>Foto</th>
                            @endif
                            <th>Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->tgl}}</td>
                                <td>{{$item->lat.','.$item->lot}}</td>
                                <td>{{$item->place}}</td>
                                <td>{{$item->konsumen}}</td>
                                @if ($cimg=='1')                                
                                <td><img src="{{asset('lap_track/'.$item->imgp)}}" width="100"></td>
                                @endif
                                <td>{{$item->report}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function(){    
        window.print();
    });
    window.onafterprint = function() {
        history.go(-1);
    };
</script>

</html>