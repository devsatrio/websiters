@extends('layoutadmin.app')
@section('title','Piutang Dan Lunas')
@section('content')
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">
                    Laporan Transaksi
                </p>
                <div class="card-tools">
                    <form action="{{route('cari.track')}}" method="post" class="form-inline">
                        @csrf
                        <div class="form-group mr-2">
                            <label for="">Cari Data</label> &nbsp;
                            <input type="text" name="tglawal" readonly class="form-control form-control-sm dat"
                                value="{!! date('Y-m-d') !!}">
                        </div>
                        <div class="form-group mr-2">
                            <label for=""> Ke </label> &nbsp;
                            <input type="text" name="tglakhir" readonly class="form-control form-control-sm dat"
                                value="{!! date('Y-m-d') !!}">
                        </div>
                        <div class="form-group mr-2">
                            <label for=""> Pilih Kategori </label> &nbsp;
                            <select name="ts" class="form-control form-control-sm" id="">
                                <option value="all">Semua</option>
                                <option value="lunas">Lunas</option>                                
                                <option value="belum">Belum Lunas</option>                                
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
                                <th>No Invoice</th>
                                <th>Tgl</th>
                                <th>Pembeli</th>
                                <th>Pengirim</th>
                                <th>Penerima</th>
                                <th>Total</th>
                                <th>Bayar</th>
                                <th>Kurang(-)/Kembali(+)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            
                        </tbody>
                    </table>                                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>  
    $('.dat').datepicker({
            format: 'yyyy-mm-dd',
        });    
</script>
@endsection