@extends('layoutadmin.app')
@section('title','Laporan Tracking')
@section('content')
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">
                    Laporan Tracking
                </p>
                <div class="card-tools">
                    <form action="{{route('cari.track')}}" method="post" class="form-inline">
                        @csrf
                        <div class="form-group mr-2">
                            <label for="">Cari Laporan</label> &nbsp;
                            <input type="text" name="tglawal" readonly class="form-control form-control-sm dat"
                                value="{!! date('Y-m-d') !!}">
                        </div>
                        <div class="form-group mr-2">
                            <label for=""> Ke </label> &nbsp;
                            <input type="text" name="tglakhir" readonly class="form-control form-control-sm dat"
                                value="{!! date('Y-m-d') !!}">
                        </div>
                        <div class="form-group mr-2">
                            <label for=""> Pilih TS </label> &nbsp;
                            <select name="ts" class="form-control form-control-sm" id="">
                                <option value="all">Semua</option>
                                @foreach ($kar as $k)
                                <option value="{{$k->id}}">{{$k->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mr-2">
                            <label for=""></label>
                            <button type="submit" class="btn-sm btn-primary">Tampilkan</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
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
                                <th>Report</th>
                                <th>Opsi</th>
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
                                    <td>{{$item->telp}}</td>
                                    <td>{{$item->report}}</td>
                                    <td>
                                        <a href="{{route('del.track',['id'=>$item->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (empty($tgl1)||empty($tgl2)||empty($idk))

                    @else
                    <div class="form-check-group float-right">
                        <input type="checkbox" id="im" class="form-check-control" onclick="setPrint()">
                        <label for="" class="mr-2">Sertakan Gambar Lokasi</label>
                        <a id="noimg" href="{{route('print.track',['tgl1'=>$tgl1,'tgl2'=>$tgl2,'idk'=>$idk,'img'=>'0'])}}" class="btn btn-primary float-right"><i class="fa fa-print"></i> Cetak Laporan</a>                                                
                        <a id="img" style="display:none" href="{{route('print.track',['tgl1'=>$tgl1,'tgl2'=>$tgl2,'idk'=>$idk,'img'=>'1'])}}" class="btn btn-primary float-right"><i class="fa fa-print"></i> Cetak Laporan + foto</a>
                    </div>
                    {{-- {{dd($tgl2)}} --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $('#img').hide();
    });
    function setPrint(){
        var ck=document.getElementById('im');
        var btprint=document.getElementById('igprint');
        if(ck.checked==true){
            $('#img').show();
            $('#noimg').hide();
        }else{
            $('#noimg').show();
            $('#img').hide();
        }
    }

    $('.dat').datepicker({
            format: 'yyyy-mm-dd',
        });    
</script>
@endsection