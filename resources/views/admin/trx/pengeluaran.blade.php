@extends('layoutadmin.app')
@section('title','Pengeluaran')
@section('css')
    <link rel="stylesheet" href="{{asset('js_view/loading.css')}}">
    <style media="screen">
        .judul{
            display: none;            
        }
       
    </style>
    <style media="print">
        .opsi{
            display: none;
        }
        .card-header{
            display: none;
        }
    </style>
@endsection
@section('content')
<div class="judul">
    <center>
    <h3>
        Laporan Pengeluaran <span id="dts"></span>
    </h3>
</center>
</div>
<div class="row">    
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">
                    Data Pengeluaran
                </p>
                <div class="card-tools">
                    <form class="form-inline">                        
                        <div class="form-group mr-2">
                            <label for="">Cari Data</label> &nbsp;
                            <input type="text" name="tglawal" id="dt1" readonly class="form-control form-control-sm dat"
                                value="{!! date('Y-m-d') !!}">
                        </div>
                        <div class="form-group mr-2">
                            <label for=""> Ke </label> &nbsp;
                            <input type="text" name="tglakhir" id="dt2" readonly class="form-control form-control-sm dat"
                                value="{!! date('Y-m-d') !!}">
                        </div>                       
                        <div class="form-group mr-2">
                            <label for=""></label>
                            <button type="button" onclick="cari()" class=" btn btn-sm btn-primary">Tampilkan</button>
                        </div>
                        <div class="form-group mr-2">
                            <div data-target="#addpen" data-toggle="modal" class="btn btn-info btn-sm"><span class="fa fa-plus"></span></div>
                        </div>
                        <div class="form-group mr-2">
                            <button onclick="cetak()" type="button"  class="btn btn-sm btn-danger"><span class="fa fa-print"></span></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="printarea">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Admin</th>
                                    <th>Tgl</th>
                                    <th>Keterangan</th>
                                    <th>Amount</th>
                                    <th>Penanggung Jawab</th>
                                    <th class="opsi">Opsi</th>
                                </tr>
                            </thead>
                            <tbody id="datap">
                            </tbody>
                        </table>                                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="addpen">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Add Pengeluaran</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Keterangan Pengeluaran</label>
                        <input type="text" id="tket" class="form-control" placeholder="Masukan keterangan">
                    </div>
                    <div class="form-group">
                        <label for="">Nominal</label>
                        <input type="text" id="tnominal" class="form-control" placeholder="Masukan nominal">
                    </div>
                    <div class="form-group">
                        <label for="">Yang Bersangkutan</label>
                        <input type="text" id="tybs" class="form-control" placeholder="Masukan Ybs">
                    </div>
                    <div class="form-group">
                        <button type="button" onclick="add()" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('js_view/loading.js')}}"></script>
<script>  
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')    
        }
    });
    $(document).ready(function(){
        getData();
    })

    $('.dat').datepicker({
            format: 'yyyy-mm-dd',
        });            
    // laod data
    function getData(){
        $('.card-body').loading();
        var baris="";
        var no=1;
        var total=0;
        $.ajax({
            type:'get',
            dataType:'json',
            url:'show-pengeluaran',
            success:function(response){
                
                $.each(response.data,function(key,val){
                    baris=baris+'<tr><td>'+ no++ +'</td><td>'+val.admin+'</td><td>'+val.tgl+'</td><td>'+val.keterangan+'</td><td>Rp. '+numberWithCommas (val.jumlah)+'</td><td>'+val.penjab+'</td><td class="opsi"><button onclick="del('+val.id+')" class="btn btn-danger btn-sm mr-2"><span class="fa fa-trash"></span></button></td></tr>';
                    total+=parseInt(val.jumlah);
                });

                $('#datap').html(baris);
                $('#datap').append('<tr><td align="right" colspan="4">Total</td><td colspan="2">Rp. '+ numberWithCommas(total) +'</td></tr>');
            }
        });
    }
    // simpan pengeluaran
    function add(){
        var ket=$('#tket').val();
        var nom=$('#tnominal').val();
        var ybs=$('#tybs').val();
        var msg="";
        $.ajax({
            type:'POST',
            dataType:'json',
            url:'add-pengeluaran',
            data:{ ket:ket , nom:nom , ybs:ybs },
            success:function(data){
               alert(data.msg);               
               getData();
            }
        });
    }
 
    function del(id){
        var cf=confirm("Apakah Anda Ingin menghapus data ini?");
        if(cf==true){
            $.ajax({
                type:'get',
                dataType:'json',
                url:'del-pengeluaran/'+id,
                success:function(data){
                    alert(data.msg);
                    getData();
                }
            });
        }
    }
    function cari(){
        var dt1=$('#dt1').val();
        var dt2=$('#dt2').val();
        var no=1;
        var baris='';
        var total=0;
        $.ajax({
            type:'get',
            dataType:'json',
            url:'cari-pengeluaran/'+dt1+'/'+dt2,
            success:function(response){
                $.each(response.data,function(key,val){
                    baris=baris+'<tr><td>'+ no++ +'</td><td>'+val.admin+'</td><td>'+val.tgl+'</td><td>'+val.keterangan+'</td><td>Rp. '+numberWithCommas (val.jumlah)+'</td><td>'+val.penjab+'</td><td class="opsi"><button onclick="del('+val.id+')" class="btn btn-danger btn-sm mr-2"><span class="fa fa-trash"></span></button></td></tr>';
                    total+=parseInt(val.jumlah);
                });
                $('#datap').html(baris);
                $('#datap').append('<tr><td align="right" colspan="4">Total</td><td colspan="2">Rp. '+ numberWithCommas(total) +'</td></tr>');
            }
        });
    }
    function cetak(){ 
        var dt1=$('#dt1').val();
        var dt2=$('#dt2').val();
        $('#dts').html(dt1+" sampai "+dt2)
        window.print();
    }
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
@endsection