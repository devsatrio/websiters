@extends('layoutadmin.app')
@section('title','TRX Produk')
@section('content')
    <div class="content">
        <div class="row">   
            {{-- Customer --}}
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-body">  
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Admin</label>
                                </div>
                                <div class="col-lg-8 col-8">
                                    <input type="text" readonly class="form-control" id="admin" value="{{Auth::user()->nama}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Customer</label>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <select name="" id="cst"  class="form-control pilCs">                                        
                                    </select>
                                </div>
                                <div class="col-lg-2 col-2">
                                    <button type="button" data-target="#mdlcs" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Telepon</label>
                                </div>
                                <div class="col-lg-8 col-8">
                                   <input type="text" id="cstelp" readonly class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Alamat </label>
                                </div>
                                <div class="col-lg-8 col-8">
                                   <textarea  id="csalmt" cols="10" readonly rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            {{-- Penerima --}}
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Penerima</label>
                                </div>
                                <div class="col-lg-8 col-8">
                                   <input type="text" id="tpenerima" class="form-control" placeholder="Isikan penerima">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Telp</label>
                                </div>
                                <div class="col-lg-8 col-8">
                                   <input type="text" id="ttelppn" class="form-control" placeholder="Isikan telepon">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">alamat</label>
                                </div>
                                <div class="col-lg-8 col-8">
                                   <textarea  id="tpenerima" id="talamatpn" cols="10" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>     
          {{-- Insert Barang --}}
            <div class="col-lg-4 col-12">                
                <div class="card">
                    <div class="card-body">                        
                        <span id="msg" style="color:red"></span>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Pilih Jenis</label>
                                </div>
                                <div class="col-lg-8 col-8">
                                    <div class="form-group">
                                        <select class="form-control pilJenis">
                                            <option disabled selected>Pilih</option>
                                            <option>Pakan</option>
                                            <option>Suplemen</option>
                                        </select>
                                    </div>
                                </div> 
                                <hr>
                                <div class="col-lg-4 col-4">
                                    <label for="">Cari Produk</label>
                                </div>
                                <div class="col-lg-8 col-8">
                                    <select name="" id="pilProd" required class="form-control">                                        
                                    </select>
                                </div>                                                            
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Stok</label>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <input type="text" id="stk" required class="form-control" readonly>
                                </div>                    
                                <div class="col-lg-2 col-2">
                                    <p id="satuan">kg/pcs</p>
                                </div>           
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Qty</label>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <input type="number" id="sqty" min="1" required class="form-control" value="1">
                                </div>                    
                                <div class="col-lg-2 col-2">
                                    <button id="btnadd" onclick="addP()" class="btn btn-success float-right"><i class="fa fa-cart-plus"></i></button>
                                </div>           
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>           
            {{-- Nomor Inv Sj, PO --}}
            <div class="col-lg-12 col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        Trx Produk
                        <div class="card-tools">
                           <button class="btn btn-sm btn-info" id="btnTrx" onclick="saveTrx()"><i class="fa fa-print"></i> Simpan & Print</button>
                           <button class="btn btn-sm btn-primary" onclick="location.reload()"><i class="fa fa-check-square"></i> Selesai</button>                           
                        </div>
                    </div> --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-12">
                                <div class="form-group">
                                    <label for="">Invoice</label>
                                    <input type="text" value="{{$inv}}" id="noivc" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="form-group">
                                    <input type="checkbox" class="ckPo" name="" id=""> 
                                    <label for="">No PO</label>
                                    <input type="text" class="form-control noPo" readonly value="-">
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="form-group">
                                    <input type="checkbox" class="ckSj" name="" id=""> 
                                    <label for="">No SJ</label>
                                    <input type="text" class="form-control noSj" readonly value="-">
                                </div>
                            </div>                            
                            <div class="col-lg-2 col-12">
                                <div class="form-group">                                    
                                    <label for="">Bayar</label>
                                    <input type="text" class="form-control " id="tbayar" value="0">
                                </div>
                            </div>                                                                                  
                            <div class="col-lg-2 col-12">
                                <div class="form-group">                                  
                                    <label for="">Kurang / Kembali</label>
                                    <input type="text" class="form-control "readonly id="tkurang" value="0">
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
            {{-- list barang --}}
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped">
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Diskon</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                                <tbody id="listp">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
             {{-- Total TRX --}}
             <div class="col-lg-4 col-12">
                <div class="card">                    
                    <div class="card-body">
                      <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Sub Total</label>
                                </div>
                                <div class="col-lg-8 col-8">
                                    <input type="text" value="0" id="tstotal" readonly class="form-control">
                                </div>                               
                            </div>
                        </div>
                      <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Diskon</label>
                                </div>
                                <div class="col-lg-8 col-8">
                                    <input type="text" value="0" id="tdiskon" readonly class="form-control">
                                </div>                               
                            </div>
                        </div>
                      <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Potongan</label>
                                </div>
                                <div class="col-lg-8 col-8">
                                    <input type="text" value="0" id="tpotongan" class="form-control">
                                </div>                               
                            </div>
                        </div>
                      <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <label for="">Total</label>
                                </div>
                                <div class="col-lg-8 col-8">
                                    <input type="text" value="0" id="ttotal" readonly class="form-control">
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- bayar --}}
            <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-12 col-lg-8"><h2>Total Rp.</h2> </div>
                    </div>
                    <div class="card-body">
                        <div class="row">                           
                            <div class="col-12 col-lg-6">
                                <div class="btn btn-info mr-2"><span class="fa fa-print"></span> Simpan Dan Print</div>                        
                            </div>
                            <div class="col-12 col-lg-6">                                                   
                                <div class="btn btn-primary mr-2"><span class="fa fa-check-o"></span> Selesai</div>                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </div>
    {{-- moadl add --}}
<div class="modal fade" id="mdlcs">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Tambah Customer</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.customer')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Isikan Nama</label>
                        <input type="text" name="nama" required class="form-control" value="{{old('nama')}}"
                            placeholder="Isikan Nama">
                    </div>
                    <div class="form-group">
                        <label for="">Isikan alamat</label>
                        <input type="text" name="alamat" required class="form-control" value="{{old('alamat')}}"
                            placeholder="Isikan Nama">
                    </div>
                    <div class="form-group">
                        <label for="">Isikan Telepon</label>
                        <input type="number" name="telp" required class="form-control" value="{{old('telp')}}"
                            placeholder="Isikan Telepon">
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class=" btn btn-primary float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')    
    }
    });
</script>
<script src="{{asset('js_view/trx.js')}}"></script>  
@endsection