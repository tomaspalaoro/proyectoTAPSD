$(document).ready(function() {
  console.log("ready");
   

  $("#calendar").fullCalendar({

    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    },

    locale: 'es',

    defaultView: "month",
    navLinks: true, 
    editable: true,
    eventLimit: true, 
    selectable: true,
    selectHelper: false,



//Nuevo Evento
  select: function(start, end){
      $("#exampleModal").modal();
      $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY hh:mm'));
       
      var valorFechaFin = end.format("DD-MM-YYYY hh:mm");
      var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY hh:mm'); //Le resto 1 dia
      $('input[name=fecha_fin').val(F_final);  

    },
 
   
  events:{
    url: 'SW_Evento.php'
  
},

//Eliminar Evento
eventRender: function(event, element) {
    element
      .find(".fc-content")
      .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");
    
    //Eliminar evento
    element.find(".closeon").on("click", function() {

  var pregunta = confirm("Deseas Borrar este Evento?");   
  if (pregunta) {
    console.log(event.id);
    $("#calendar").fullCalendar("removeEvents", event.id);
     $.ajax({
            type: "POST",
            url: 'deleteEvento.php',
            data: { id: event.id},
            success: function(datos)
            {
              
              $(".alert-danger").show();

              setTimeout(function () {
                $(".alert-danger").slideUp(500);
              }, 3000); 

            }
        });
      }
    });
  },


//Moviendo Evento Drag - Drop
eventDrop: function (event, delta) {
  var idEvento = event.id;
  //console.log(idEvento);
  var start = (event.start.format('DD-MM-YYYY hh:mm'));
  var end = (event.end.format("DD-MM-YYYY hh:mm"));

    $.ajax({
        url: 'drag_drop_evento.php',
        data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
        type: "POST",
        success: function (response) {
        alert("Acaba de mover el Evento,es correcto?")
        }
    });
},

//Modificar Evento del Calendario 
eventClick:function(event){
    var idEvento = event.id;
    console.log(idEvento);
    $('input[name=idEvento').val(idEvento);
    $('input[name=evento').val(event.title);
    $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY hh:mm'));
    $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY hh:mm"));

    $("#modalUpdateEvento").modal();
  },


  });


//Oculta mensajes de Notificacion
  setTimeout(function () {
    $(".alert").slideUp(300);
  }, 3000); 



});
