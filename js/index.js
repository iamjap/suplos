/*
  Creación de una función personalizada para jQuery que detecta cuando se detiene el scroll en la página
*/
$.fn.scrollEnd = function(callback, timeout) {
  $(this).scroll(function(){
    var $this = $(this);
    if ($this.data('scrollTimeout')) {
      clearTimeout($this.data('scrollTimeout'));
    }
    $this.data('scrollTimeout', setTimeout(callback,timeout));
  });
};
/*
  Función que inicializa el elemento Slider
*/

function inicializarSlider(){
  $("#rangoPrecio").ionRangeSlider({
    type: "double",
    grid: false,
    min: 0,
    max: 100000,
    from: 200,
    to: 80000,
    prefix: "$"
  });
}
/*
  Función que reproduce el video de fondo al hacer scroll, y deteiene la reproducción al detener el scroll
*/
function playVideoOnScroll(){
  var ultimoScroll = 0,
      intervalRewind;
  var video = document.getElementById('vidFondo');
  $(window)
    .scroll((event)=>{
      var scrollActual = $(window).scrollTop();
      if (scrollActual > ultimoScroll){
       
     } else {
        //this.rewind(1.0, video, intervalRewind);
        video.play();
     }
     ultimoScroll = scrollActual;
    })
    .scrollEnd(()=>{
      video.pause();
    }, 10)
}

function SaveItem($id){

    var formData = new FormData();
        formData.append('id_bien',$id);
        $.ajax({
            url: "save_item.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(res){
            
            if(res==1){         
                  alert("Guardado exitosamente")                
            }else if(res==0){                              
                  alert("Esta Item ya fue agregado a mis bienes")                      
            }else if(res==2){
                  alert("Ha ocurrido un error, intente de nuevo");
            }
        });
}

function DeleteItem($id){

  var formData = new FormData();
        formData.append('id_bien',$id);
        $.ajax({
            url: "delete_item.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function(res){
            
            if(res==1){         
                    alert("Item eliminado");
                    location.reload(); 
            }else{
                alert("Ha ocurrido un error, intente de nuevo");
            }
        });


}

  function FiltrarBienes(){
   
    var ciudad = $("#selectCiudad").val();
    var tipo = $("#selectTipo").val();
      if(ciudad !=0 && tipo !=0){
         $(".BienesContenido").css("display","none");

        $("."+ciudad+"."+tipo).css("display","block");
        $("#id_ResBusqueda").text('Resultados de la búsqueda:'+($("."+ciudad+"."+tipo).length));
        $("#ResultadosBus").css("display","block");

      }
      else if(ciudad ==0 && tipo !=0){
         $(".BienesContenido").css("display","none");
         $("."+tipo).css("display","block");
         $("#id_ResBusqueda").text('Resultados de la búsqueda:'+($("."+tipo).length));
         $("#ResultadosBus").css("display","block");


      }else if(ciudad !=0 && tipo ==0){
         $(".BienesContenido").css("display","none");
         $("."+ciudad).css("display","block");
         $("#id_ResBusqueda").text('Resultados de la búsqueda:'+($("."+ciudad).length));
         $("#ResultadosBus").css("display","block");

      }else if(ciudad ==0 && tipo ==0){
            alert('Debe seleccionar al menos un parámetro para la búsqueda');
      }

         


  }

    function ResetBusqueda(){
     $(".BienesContenido").css("display","block"); 
     $("#ResultadosBus").css("display","none");
     $('#formulario').trigger("reset"); 
 
  }



inicializarSlider();
//playVideoOnScroll();
