var valueluasTanah = document.getElementById('luasTanah');
if ( valueluasTanah != null ) {
  valueluasTanah.addEventListener('keyup', function(e)
  {
    valueluasTanah.value = formatRupiah(this.value);
  });
}
var valuenjopTanah = document.getElementById('njopTanah');
if ( valuenjopTanah != null ) {
  valuenjopTanah.addEventListener('keyup', function(e)
  {
    valuenjopTanah.value = formatRupiah(this.value);
  });
}
var valueluasBangunan = document.getElementById('luasBangunan');
if ( valueluasBangunan != null ) {
  valueluasBangunan.addEventListener('keyup', function(e)
  {
    valueluasBangunan.value = formatRupiah(this.value);
  });
}
var valueNjopBangunan = document.getElementById('njopBangunan');
if ( valueNjopBangunan != null ) {
  valueNjopBangunan.addEventListener('keyup', function(e)
  {
    valueNjopBangunan.value = formatRupiah(this.value);
  });
}
var valuehargaTransaksi = document.getElementById('hargaTransaksi');
if ( valuehargaTransaksi != null ) {
  valuehargaTransaksi.addEventListener('keyup', function(e)
  {
    valuehargaTransaksi.value = formatRupiah(this.value);
  });
}
var valueNpop = document.getElementById('npop');
if ( valueNpop != null ) {
  valueNpop.addEventListener('keyup', function(e)
  {
    valueNpop.value = formatRupiah(this.value);
  });
}
var valueNpoptkp = document.getElementById('npoptkpadmin');
if ( valueNpoptkp != null ) {
  valueNpoptkp.addEventListener('keyup', function(e)
  {
    valueNpoptkp.value = formatRupiah(this.value);
  });
}
var valueNpopkpadmin = document.getElementById('npopkpadmin');
if ( valueNpopkpadmin != null ) {
  valueNpopkpadmin.addEventListener('keyup', function(e)
  {
    valueNpopkpadmin.value = formatRupiah(this.value);
  });
}
var valueBphtbTerhutangAdmin = document.getElementById('bphtbTerhutangAdmin');
if ( valueBphtbTerhutangAdmin != null ) {
  valueBphtbTerhutangAdmin.addEventListener('keyup', function(e)
  {
    valueBphtbTerhutangAdmin.value = formatRupiah(this.value);
  });
}
var valueTotalPenguranganAdmin = document.getElementById('totalPenguranganAdmin');
if ( valueTotalPenguranganAdmin != null ) {
  valueTotalPenguranganAdmin.addEventListener('keyup', function(e)
  {
    valueTotalPenguranganAdmin.value = formatRupiah(this.value);
  });
}
var valueBphtbAdmin = document.getElementById('bphtbAdmin');
if ( valueBphtbAdmin != null ) {
  valueBphtbAdmin.addEventListener('keyup', function(e)
  {
    valueBphtbAdmin.value = formatRupiah(this.value);
  });
}
var hasilNpop = document.getElementById('hasilNpop');
if ( hasilNpop != null ) {
  hasilNpop.addEventListener('keyup', function(e)
  {
    hasilNpop.value = formatRupiah(this.value);
  });
}
function formatRupiah(angka, prefix)
{
  var angka_asli = parseInt(angka),
    number_string = angka.replace(/[^,\d]/g, '').toString(),
    split	= number_string.split(','),
    sisa 	= split[0].length % 3,
    rupiah 	= split[0].substr(0, sisa),
    ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);;

  if (ribuan) {
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  if ( angka_asli < 0 )
    rupiah = '-' + rupiah;

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
}
function sumTanah() {
    var valueLuasTanah = document.getElementById('luasTanah').value;
    var valueNjopTanah = document.getElementById('njopTanah').value;
    var hasilNjopTanah = parseInt(valueLuasTanah.replace(/,.*|[^0-9]/g, ''), 10) * parseInt(valueNjopTanah.replace(/,.*|[^0-9]/g, ''), 10);
    if (!isNaN(hasilNjopTanah)) {
      if ( hasilNjopTanah > 0 ) {
         document.getElementById("totalHasilNjopTanah").value = number_format(hasilNjopTanah,0,',','.');
      } else {
        document.getElementById("totalHasilNjopTanah").value = 0;
      }
    } else {
      document.getElementById("totalHasilNjopTanah").value = 0;
    }

    var valueLuasBangunan = document.getElementById('luasBangunan').value;
    var valueNjopBangunan = document.getElementById('njopBangunan').value;
    var hasilNjopBangunan = parseInt(valueLuasBangunan.replace(/,.*|[^0-9]/g, ''), 10) * parseInt(valueNjopBangunan.replace(/,.*|[^0-9]/g, ''), 10);
    if (!isNaN(hasilNjopBangunan)) {
      if ( hasilNjopBangunan > 0 ) {
        document.getElementById("totalHasilNjopBangunan").value = number_format(hasilNjopBangunan,0,',','.');
      } else {
        document.getElementById("totalHasilNjopBangunan").value = 0;
      }
    } else {
      document.getElementById("totalHasilNjopBangunan").value = 0;
    }

    var totalNjop = parseInt(hasilNjopTanah) + parseInt(hasilNjopBangunan);
    if (!isNaN(totalNjop)) {
      if ( totalNjop > 0 ) {
        document.getElementById("totalHasilNjop").value = number_format(totalNjop,0,',','.');
        document.getElementById('totalNjop').value = totalNjop;
      } else {
        document.getElementById('totalNjop').value = 0;
      }
    } else {
      document.getElementById('totalNjop').value = 0;
    }

}
if(document.getElementById("npoptkp"))
{
    document.getElementById("npoptkp").value = '0';
}
function sumBphtb() {
  var hasilNpop = document.getElementById('hasilNpop').value;
  var valueNpoptkp = document.getElementById('npoptkp').value;
  var hasilNpopkp = parseInt(hasilNpop.replace(/,.*|[^0-9]/g, ''), 10) - parseInt(valueNpoptkp.replace(/,.*|[^0-9]/g, ''), 10);
  if (!isNaN(hasilNpopkp)) {
    if ( hasilNpopkp > 0 ) {
      document.getElementById("vHasilNpopkp").innerHTML = '<b>' + number_format(hasilNpopkp,0,',','.') + '</b>';
      document.getElementById('hasilNpopkp').value = hasilNpopkp;
    } else {
      document.getElementById("vHasilNpopkp").innerHTML = '<b>0</b>';
      document.getElementById('hasilNpopkp').value = 0;
    }
  } else {
    document.getElementById("vHasilNpopkp").innerHTML = '<b>0</b>';
    document.getElementById('hasilNpopkp').value = 0;
  }

  var bphtbTerhutang = ( parseInt(hasilNpopkp) * 5 ) / 100;
  if (!isNaN(bphtbTerhutang)) {
    if ( bphtbTerhutang > 0 ) {
      document.getElementById("vBphtbTerhutang").innerHTML = '<b>' + number_format(bphtbTerhutang,0,',','.') + '</b>';
      document.getElementById('bphtbTerhutang').value = bphtbTerhutang;
    } else {
      document.getElementById("vBphtbTerhutang").innerHTML = '<b>0</b>';
      document.getElementById('bphtbTerhutang').value = 0;
    }
  } else {
    document.getElementById("vBphtbTerhutang").innerHTML = '<b>0</b>';
    document.getElementById('bphtbTerhutang').value = 0;
  }

  var valuePengurangan = document.getElementById('pengurangan').value;
  if ( valuePengurangan != '' ) {
    var hasilPengurangan = ( parseInt(bphtbTerhutang) * parseInt(valuePengurangan)  ) / 100;
  } else {
    var hasilPengurangan = parseInt(0);
  }
  if (!isNaN(hasilPengurangan)) {
    if ( hasilPengurangan > 0 ) {
      document.getElementById("vTotalPengurangan").innerHTML = '<b>' + number_format(hasilPengurangan,0,',','.') + '</b>';
      document.getElementById('totalPengurangan').value = hasilPengurangan;
    } else {
      document.getElementById("vTotalPengurangan").innerHTML = '<b>0</b>';
      document.getElementById("totalPengurangan").value = '0';
    }
  } else {
    document.getElementById("vTotalPengurangan").innerHTML = '<b>0</b>';
    document.getElementById("totalPengurangan").value = '0';
  }

  var bphtb = parseInt(bphtbTerhutang) - parseInt(hasilPengurangan);

  if (!isNaN(bphtb)) {
    if ( bphtb > 0 ) {
      document.getElementById("vBphtb").innerHTML = '<b>' + number_format(bphtb,0,',','.') + '</b>';
      document.getElementById('bphtb').value = bphtb;
    } else {
      document.getElementById("vBphtb").innerHTML = '<b>0</b>';
      document.getElementById('bphtb').value = 0;
    }
  } else {
    document.getElementById("vBphtb").innerHTML = '<b>0</b>';
    document.getElementById('bphtb').value = 0;
  }
  $("#hasilNpop").trigger('change');
}

function isNumberKey(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
  return true;
}
function number_format(a, b, c, d) {

     a = Math.round(a * Math.pow(10, b)) / Math.pow(10, b);

     e = a + '';
     f = e.split('.');
     if (!f[0]) {  f[0] = '0';}
     if (!f[1]) {  f[1] = '';  }

     if (f[1].length < b) {
        g = f[1];
        for (i=f[1].length + 1; i <= b; i++) {
           g += '0';
        }
        f[1] = g;
     }

     if(d != '' && f[0].length > 3) {
        h = f[0];
        f[0] = '';
        for(j = 3; j < h.length; j+=3) {
           i = h.slice(h.length - j, h.length - j + 3);
           f[0] = d + i +  f[0] + '';
        }
        j = h.substr(0, (h.length % 3 == 0) ? 3 : (h.length % 3));
        f[0] = j + f[0];
     }

     c = (b <= 0) ? '' : c;
    return f[0] + c + f[1];
}