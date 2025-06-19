//--Tampil Data Detail Komunitas
$(document).ready(function(){

    var table = $('#example').DataTable({

        order:[[10, "desc"]],

      processing: true,
      serverSide: true,
      responsive: true,

      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
      },
      ajax: {"url":'/register/header/',
            "method":"POST",
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
      },
      // aaSorting: [[1, 'asc']],
      columns: [
       {
        "data": "Tanggal",
        render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }},


      {data: "kode" , name: 'kode'},
      { data: 'skope', name: 'skope'},
      { data: 'nama', name: 'nama' },
      { data: 'propinsi', name: 'propinsi' },
      { data: 'kabupaten', name: 'kabupaten' },
      { data: 'approval', name: 'approval' },
      { data: 'have_rayon', name: 'have_rayon' },
      { data: 'status_rekening', name: 'status_rekening' },
      { data: 'status_pusat', name: 'status_pusat' },
      { data: 'wkt_registrasi', name: 'wkt_registrasi' },
      { defaultContent: '<button class="btn btn-success">Show</button>'}
      ],
      });



        $('#example tbody').on('click', 'button', function () {
        var data = table.row($(this).parents('tr')).data();
        var kode = data.kode;
        var namakomunitas = data.nama;
        var url = 'register/kodekomunitas/'+kode+'/'+namakomunitas;
        //Call ajax
    $.ajax({
    type : "POST",
    url : url,
    "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success:function(response){
        console.log(response)
        const komdetail = response[0].kom_detail;
        const alamat = JSON.parse(komdetail);
        const kontakperson = response[0].kontak_person;
        const detailkontak = JSON.parse(kontakperson);
        const rekening = response[0].rekening;
        const detailrek = JSON.parse(rekening);
        const wilayah = response[0].wilayah;
        const detailwilayah = JSON.parse(wilayah);
        const namakom = response[1];
        const namakomunitas = JSON.parse(namakom);
   

        $('#modaldetailkomunitas').modal('show');
         
  
            if (response[0].have_rayon == 0)
            {
                let rayon = $('#rayon')
                rayon.empty()
                rayon.append(`Tidak`)
            }
            else
            {
                let rayon = $('#rayon')
                rayon.empty()
                rayon.append(`Ya`)
            }


         let skope = $('#skope')
            skope.empty()
            if (response[0].skop == 0)
            {
                skope.append(`Nasional`)
            }
             if (response[0].skop == 1)
            {
                skope.append(`Provinsi`)
            }
             if (response[0].skop == 2)
            {
                skope.append(`Kabupaten`)
            }

        let sss = $('#namakomunitas')
            sss.empty()
            sss.append(`${namakomunitas}`)

         let alamatkomunitas = $('#alamat')
            alamatkomunitas.empty()
            alamatkomunitas.append(`${alamat.alamat}`)

         let kodepos = $('#kodepos')
            kodepos.empty()
            kodepos.append(`${alamat.kodepos}`)

         let kota = $('#kota')
            kota.empty()
            kota.append(`${alamat.kota_kab}`)

         let nomorkerjasama = $('#nomorkerjasama')
            nomorkerjasama.empty()
            nomorkerjasama.append(`${alamat.nomor_kerjasama}`)

         let propinsi = $('#propinsi')
            propinsi.empty()
            propinsi.append(`${alamat.propinsi}`)

         let nama = $('#nama')
            nama.empty()
            nama.append(`${detailkontak.nama}`)

         let email = $('#email')
            email.empty()
            email.append(`${detailkontak.email}`)

         let nohp = $('#nohp')
            nohp.empty()
            nohp.append(`${detailkontak.nomor_hp}`)
            
         let statusrek = $('#statusrek')
            statusrek.empty()
            for (let i = 0; i < detailrek.length; i++) {
            statusrek.append(`${detailrek[i].status},`)


            }

        let norek = $('#norek')
            norek.empty()
            for (let i = 0; i < detailrek.length; i++) {
            norek.append(`${detailrek[i].no_rekening},`)

            }

        let jenisrek = $('#jenisrek')
            jenisrek.empty()
            for (let i = 0; i < detailrek.length; i++) {
            jenisrek.append(`${i+1}.\r\n[${detailrek[i].no_rekening}]${detailrek[i].jenis_rekening}<br>`)

            }

            if (detailwilayah == null) 
            {
                kodedaerah.append(`-`)
            }
            else
            {
        let kodedaerah = $('#kodedaerah')
            kodedaerah.empty()
            for (let i = 0; i < detailwilayah.length; i++) {
            kodedaerah.append(`${detailwilayah[i].kode_daerah},`)
 
            }
        }


            if (response[0].skop == 0){

                if (response[0].tipe_rayon == 0){

                    let namadaerah = $('#namadaerah')
                    namadaerah.empty()
                    namadaerah.append(`Seluruh Provinsi`)

            
                }

                else
                {
                    if (detailwilayah == null) 
            {
                let namadaerah = $('#namadaerah')
                namadaerah.empty()
                namadaerah.append(`-`)
            }
            else
            {
                    let namadaerah = $('#namadaerah')
                    namadaerah.empty()
                    for (let i = 0; i < detailwilayah.length; i++) {
                    namadaerah.append(`${i+1}.\r\n[${detailwilayah[i].kode_daerah}]\r\n${detailwilayah[i].nama_daerah}<br>`)
            }

                }
                }

            }


            if (response[0].skop == 1){

                if (response[0].tipe_rayon == 0){

                    let namadaerah = $('#namadaerah')
                    namadaerah.empty()
                    namadaerah.append(`Seluruh Kabupaten`)

            
                }

                else
                {


                     if (detailwilayah == null) 
            {
                let namadaerah = $('#namadaerah')
                namadaerah.empty()
                namadaerah.append(`-`)
            }
            else
            {
                    let namadaerah = $('#namadaerah')
                    namadaerah.empty()
                    for (let i = 0; i < detailwilayah.length; i++) {
                    namadaerah.append(`${i+1}.\r\n[${detailwilayah[i].kode_daerah}]\r\n${detailwilayah[i].nama_daerah}<br>`)
            }

                }
                }

            }


            if (response[0].skop == 2){

                if (response[0].tipe_rayon == 0){

                    let namadaerah = $('#namadaerah')
                    namadaerah.empty()
                    namadaerah.append(`Seluruh Kecamatan`)

            
                }

                else
                {

            if (detailwilayah == null) 
            {
                let namadaerah = $('#namadaerah')
                namadaerah.empty()
                namadaerah.append(`-`)
            }
            else
            {
                    let namadaerah = $('#namadaerah')
                    namadaerah.empty()
                    for (let i = 0; i < detailwilayah.length; i++) {
                    namadaerah.append(`${i+1}.\r\n[${detailwilayah[i].kode_daerah}]\r\n${detailwilayah[i].nama_daerah}<br>`)
            }
                }
                }

            }
        
                 
                   
    }
});


});  
        

    });
