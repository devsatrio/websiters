// window.onbeforeunload=function(){
//     return "Transaksi akan tersimpan otomatis , Apakah Anda ingin meninggalkan halaman ini ?";
// }
// cek total
cekTotal();
// load ccutomer
customer();
// cek bila ada pending trx
getDetailTrx();
// ambil no Po
$('.ckPo').change(function () {
    if (this.checked) {
        $('.noPo').val('Proses Generate No PO ....');
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: "Transaksi/getPo",
            success: function (data) {
                $('.noPo').val(data.kode);
                // alert(data.kode);                           
                console.log(data);
            }
        });
    } else {
        $('.noPo').val('-');
    }
});
// ambil no Sj
$('.ckSj').change(function () {
    if (this.checked) {
        $('.noSj').val('Proses Generate No SJ....');
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: "Transaksi/getSj",
            success: function (data) {
                $('.noSj').val(data.kode);
                // alert(data.kode);                           
                console.log(data);
            }
        });
    } else {
        $('.noSj').val('-');
    }
});
$(function () {
    $('#pilProd').select2({
        theme: 'bootstrap4',
    });
    $('.pilJenis').select2({
        theme: 'bootstrap4',
    });
    $('.pilCs').select2({
        theme: 'bootstrap4',
    });
});
// ambil detail barang
$('#pilProd').change(function () {
    var pild = $("#pilProd option:selected").val();
    var pil = $('.pilJenis').val();
    getDetailProd(pild, pil);
});

// ambil jenis prduk
$('.pilJenis').on('change', function () {
    var data = $('.pilJenis option:selected').text();
    if (data == "Pakan") {
        getPakan();
    } else {
        getSuplemen();
    }
});

// =============================================
var baris = "";
function getSuplemen() {
    baris = "";
    $('.opt').remove();
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: "Transaksi/getSP",
        success: function (response) {
            $.each(response.data, function (key, value) {
                baris = baris + "<option class='opt' value='" + value.id + "'>" + value.produk + "</option>";
            });
            $('#pilProd').append('<option class="opt" selected disabled>Pilih</option>');
            $('#pilProd').append(baris);
        }
    });
}
function getPakan() {
    baris = "";
    $('.opt').remove();
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: "Transaksi/getPK",
        success: function (response) {
            $.each(response.data, function (key, value) {
                baris = baris + "<option class='opt' value='" + value.id + "'>" + value.produk + "</option>";
            });
            $('#pilProd').append('<option class="opt" selected disabled>Pilih</option>');
            $('#pilProd').append(baris);
        }
    });
}
function getDetailProd(id, pil) {
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'Transaksi/getStok/' + id + '/' + pil,
        success: function (data) {
            var stk = data.stok;
            $('#stk').val(stk);
        }
    });
}
// add produk==============================
function addP() {
    if ($('#stk').val() == '') {
        $('#msg').html('Barang Belum Dipilih');
    } else if ($('#stk').val() <= 0) {
        $('#msg').html('Stok Barang habis');
    } else if ($('#cstelp').val() == '') {
        $('#msg').html('Pelanggan Belum Dipilih');
    } else {
        $('#msg').html('');
        $('.ckPo').attr('disabled', true);
        $('.ckSj').attr('disabled', true);
        var data = $('.pilJenis option:selected').text();
        var idp = $("#pilProd option:selected").val();
        addtoList(idp, data);
    }
}
function addtoList(idp, data) {
    var elm = "";
    var no = 1;
    $('#btnadd').attr('disabled', true);
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'Transaksi/getListP/' + idp + '/' + data,
        success: function (data) {
            $('#btnadd').attr('disabled', false);
            var kode = data.kode;
            var prd = data.produk;
            var hg = parseInt(data.harg_pcs);
            var qty = parseInt($('#sqty').val());
            var dsk = parseInt(data.diskon) / 100 * hg;
            var total = (hg * qty) - dsk;
            // elm=elm+'<tr><td></td><td>'+ data.kode +'</td><td>'+ data.produk +'</td><td>'+ data.harg_pcs +'</td><td>'+ qty+'</td><td>'+ data.diskon +'</td><td>'+total+'</td><td><button class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button></td></tr>';
            // $('#listp').append(elm);
            addToDetailTrx(kode, prd, hg, qty, dsk, total);
            getDetailTrx();
        }
    });
}
function addToDetailTrx(kode, prd, hg, qty, dsk, total) {
    var noinvc = $('#noivc').val();
    var jenis = $('.pilJenis').val();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "Transaksi/addDetailTrx",
        data: { inv: noinvc, kode: kode, prd: prd, jenis: jenis, hg: hg, qty: qty, dsk: dsk, total: total },
        success: function (data) {
            cekTotal();
        }
    });

}
function getDetailTrx() {
    var noinvc = $('#noivc').val();
    var baris = "";
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'Transaksi/getDetailTrx/' + noinvc,
        success: function (response) {
            $.each(response.data, function (key, data) {
                baris = baris + '<tr><td>' + data.jenis + '</td><td>' + data.kode_barang + '</td><td>' + data.barang + '</td><td>' + data.harga + '</td><td>' + data.qty + '</td><td>' + data.diskon + '</td><td>' + data.total + '</td><td><button  onclick="delPrd(' + data.id + ')" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></button></td></tr>';
            });
            $('#listp').html(baris);
            cekTotal();
        }
    });
}
function delPrd(id) {
    $.ajax({
        dataType: 'json',
        type: 'get',
        url: 'Transaksi/delBarangTrx/' + id,
        success: function (data) {
            alert(data.msg);
            getDetailTrx();
            cekTotal();
            hitung();
        }
    });

}
// ==========================================
function customer() {
    var baris = "";
    $('.ptcs').remove();
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: '/Transaksi/getCust',
        success: function (response) {
            $.each(response.data, function (key, value) {
                baris = baris + "<option class='ptcs'  value='" + value.id + "'>" + value.nama + "</option>";
            });
            $('#cst').append('<option class="ptcs" selected disabled>Pilih</option>');
            $('#cst').append(baris);
        }
    });
}
// on select Customer
$('#cst').on('change', function () {
    var id = $('#cst option:selected').val();
    getDetailCs(id);
});
function getDetailCs(id) {
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'Transaksi/getDetCs/' + id,
        success: function (data) {
            $('#cstelp').val(data.telp);
            $('#csalmt').val(data.alamat);
        }
    });
}

// Transaksi part
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
$('#tbayar,#tpotongan,#tkurang').on('keyup', function () {
    var n = parseInt($(this).val().replace(/\D/g, ''), 10);
    $(this).val(n.toLocaleString());
});
// ambil total pada trx
function cekTotal() {
    var noinvc = $('#noivc').val();
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'Transaksi/getTotalTrx/' + noinvc,
        success: function (data) {
            var stotal = data.stotal;
            var dsk = data.potongan;
            var total = stotal - dsk;
            $('#tstotal').val(stotal);
            $('#tdiskon').val(dsk);
            $('#ttotal').val(total);
        }
    });
    hitung();
}
function hitung() {
    var potongan = $('#tpotongan').val();
    var ptg = potongan.replace(',', '');
    var stotal = $('#tstotal').val();
    var bayar = $('#tbayar').val();
    var by = bayar.replace(',', '');
    var dsk = $('#tdiskon').val();
    var total = stotal - potongan - dsk;
    var totalan = potongan + dsk + by - stotal;
    var kurang = 0;
    // 
    $('#ttotal').val(total);
    $('#tkurang').val(totalan);
}
$('#tbayar,#tpotongan').on('keyup', function () {
    var tbayar = $('#tbayar').val();
    var total = $('#ttotal').val();
    var tpotongan = $('#tpotongan').val();
    var potong = tpotongan.replace(/[^\d.]/g, '');
    var bby = tbayar.replace(/[^\d.]/g, '');
    var kembali = bby - total + parseInt(potong);

    $('#tkurang').val(numberWithCommas(kembali));
});
// save to transaksi
function saveTrx() {
    var cs = $('#cst').val();
    
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: {}
        });
}