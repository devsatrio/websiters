@extends('layoutadmin.app')
@section('title','Laporan Stok Produk')
@section('content')
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title">
                    Laporan Stok Produk
                </p>                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Produk</th>
                                <th>Produk</th>
                                <th>Stok</th>
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