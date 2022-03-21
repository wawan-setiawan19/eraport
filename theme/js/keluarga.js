  function tamset(){
    var dis= document.getElementById('opsi');
    dis.style.display="block";
    var tom= document.getElementById('tomopsi');
    tom.style.display="block";
    var tomc= document.getElementById('tomclose');
    tomc.style.display="block";
    var buk= document.getElementById('buka');
    buk.style.display="none";
  }
  function tutup(){
    var dis= document.getElementById('opsi');
    dis.style.display="none";
    var tom= document.getElementById('tomopsi');
    tom.style.display="none";
    var tomc= document.getElementById('tomclose');
    tomc.style.display="none";
    var buk= document.getElementById('buka');
    buk.style.display="block";
  }
  function addkeluarga(){
    var add= document.getElementById('add');
    add.style.display="block";
    var keluarga= document.getElementById('keluarga');
    keluarga.style.display="none";
  }
  function keluarga(){
    var add= document.getElementById('add');
    add.style.display="none";
    var keluarga= document.getElementById('keluarga');
    keluarga.style.display="block";
  }
  function niknya(){
    var x= document.getElementById("ambilnik");
    var y= document.getElementById("isinik");
    getCmb= x.value;
    y.value= getCmb;
  }
  function delpen(){
    $('#formhapus').modal('show');
  }
  function hapusya(){
    else if(saveas== 'hapus'){
        var url= "<?php echo base_url();?>proses/hapusagama";
      }
      $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data){
          $('#modal_form').modal('hide');
          location.reload();
        },
      });
  }