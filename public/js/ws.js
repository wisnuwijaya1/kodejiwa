 // Connect to WebSocket Server
    let socket = new WebSocket("ws://3.1.30.53:5432");

    const obj = {mess:"dashboard", user_id:"970341064"};
    const myJSON = JSON.stringify(obj);

    socket.onopen = function(e) {
    console.log("[open] Connection established");
    console.log("Sending to server");
    // socket.send("My name is John");
    socket.send(myJSON);
    }

    socket.onmessage = function(event) {
      var data = (event.data);
      var coba = JSON.parse(data);
      console.log(coba)

//--transaksi
    document.getElementById("transaksitoday").innerHTML = coba[4]['jumlah']+' '+ 'Transaksi';
    document.getElementById("transaksitotaltoday").innerHTML = formatRupiah(coba[4]['totNominal']);
    document.getElementById("transaksiminggu").innerHTML = coba[7]['jumlah']+' '+ 'Transaksi';
    document.getElementById("transaksitotalminggu").innerHTML = formatRupiah(coba[7]['totNominal']);
    document.getElementById("transaksibulan").innerHTML = coba[5]['jumlah']+' '+ 'Transaksi';
    document.getElementById("transaksitotalbulan").innerHTML = formatRupiah(coba[5]['totNominal']);
    document.getElementById("transaksitotal").innerHTML = coba[6]['jumlah']+' '+ 'Transaksi';
    document.getElementById("transaksitotaltotal").innerHTML = formatRupiah(coba[6]['totNominal']);

//--donasi
    document.getElementById("donasihari").innerHTML = formatRupiah(coba[0]['totNominal']);
    document.getElementById("donasiharitransaksi").innerHTML = coba[0]['jumlah']+' '+ 'Transaksi';
    document.getElementById("donasiminggu").innerHTML = formatRupiah(coba[3]['totNominal']);
    document.getElementById("donasiminggutransaksi").innerHTML = coba[3]['jumlah']+' '+ 'Transaksi';
    document.getElementById("donasibulan").innerHTML = formatRupiah(coba[1]['totNominal']);
    document.getElementById("donasibulantransaksi").innerHTML = coba[1]['jumlah']+' '+ 'Transaksi';
    document.getElementById("donasitotal").innerHTML = formatRupiah(coba[2]['totNominal']);
    document.getElementById("donasitotaltransaksi").innerHTML = coba[2]['jumlah']+' '+ 'Transaksi';

//--user
    document.getElementById("userhari").innerHTML = coba[8]['jumlah'];
    document.getElementById("userminggu").innerHTML = coba[11]['jumlah'];
    document.getElementById("userbulan").innerHTML = coba[9]['jumlah'];
    document.getElementById("usertotal").innerHTML = coba[10]['jumlah'];

    }

      socket.onclose = function(event) {
    if (event.wasClean) {
            let socket = new WebSocket("ws://3.1.30.53:5432");

    const obj = {mess:"dashboard", user_id:"970341064"};
    const myJSON = JSON.stringify(obj);

    socket.onopen = function(e) {
    console.log("[open] Connection established");
    console.log("Sending to server");
    // socket.send("My name is John");
    socket.send(myJSON);
    }

    socket.onmessage = function(event) {
      var data = (event.data);
      var coba = JSON.parse(data);
      console.log(coba)
    } 

    //--transaksi
    document.getElementById("transaksitoday").innerHTML = coba[4]['jumlah']+' '+ 'Transaksi';
    document.getElementById("transaksitotaltoday").innerHTML = formatRupiah(coba[4]['totNominal']);
    document.getElementById("transaksiminggu").innerHTML = coba[7]['jumlah']+' '+ 'Transaksi';
    document.getElementById("transaksitotalminggu").innerHTML = formatRupiah(coba[7]['totNominal']);
    document.getElementById("transaksibulan").innerHTML = coba[5]['jumlah']+' '+ 'Transaksi';
    document.getElementById("transaksitotalbulan").innerHTML = formatRupiah(coba[5]['totNominal']);
    document.getElementById("transaksitotal").innerHTML = coba[6]['jumlah']+' '+ 'Transaksi';
    document.getElementById("transaksitotaltotal").innerHTML = formatRupiah(coba[6]['totNominal']);

//--donasi
    document.getElementById("donasihari").innerHTML = formatRupiah(coba[0]['totNominal']);
    document.getElementById("donasiharitransaksi").innerHTML = coba[0]['jumlah']+' '+ 'Transaksi';
    document.getElementById("donasiminggu").innerHTML = formatRupiah(coba[3]['totNominal']);
    document.getElementById("donasiminggutransaksi").innerHTML = coba[3]['jumlah']+' '+ 'Transaksi';
    document.getElementById("donasibulan").innerHTML = formatRupiah(coba[1]['totNominal']);
    document.getElementById("donasibulantransaksi").innerHTML = coba[1]['jumlah']+' '+ 'Transaksi';
    document.getElementById("donasitotal").innerHTML = formatRupiah(coba[2]['totNominal']);
    document.getElementById("donasitotaltransaksi").innerHTML = coba[2]['jumlah']+' '+ 'Transaksi';

//--user
    document.getElementById("userhari").innerHTML = coba[8]['jumlah'];
    document.getElementById("userminggu").innerHTML = coba[11]['jumlah'];
    document.getElementById("userbulan").innerHTML = coba[9]['jumlah'];
    document.getElementById("usertotal").innerHTML = coba[10]['jumlah'];
    
    }

   }


function formatRupiah(angka){

      const format = angka.toString().split('').reverse().join('');
      const convert = format.match(/\d{1,3}/g);
      const rupiah = 'Rp. ' + convert.join('.').split('').reverse().join('')

      // console.log(rupiah)
      // var number_string = angka.replace(/[^,\d]/g, '').toString(),
      // split         = number_string.split(','),
      // sisa          = split[0].length % 3,
      // rupiah        = split[0].substr(0, sisa),
      // ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // // tambahkan titik jika yang di input sudah menjadi angka ribuan
      // if(ribuan){
      //   separator = sisa ? '.' : '';
      //   rupiah += separator + ribuan.join('.');
      // }

      return rupiah;
    }