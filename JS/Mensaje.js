$( document ).ready(function() {
console.log("Ready!")

$('header').click(function(e){
    if ( e.target.id != 'icon-header'){
      $("#notification-latest").hide();
    }
  });

  $.get("navbar_sidebar.html", function(data){
    setInterval(function() {
      var request = $.ajax({
        url: "./PHP/SW_mensaje.php",
        method: "POST",
        data: {
            accion: "num_notificaciones",
        },
        dataType: "json",
        success: function(request){
          for(i=0;i<request.data.length;i++){ 
            console.log(request.data[i].num_notificaciones);
            $("#notification-count").empty();
            $("#notification-count").append(request.data[i].num_notificaciones); 
           }
                               
        }
    });
  }, 5000);
    
  });

  $.get("navbar_sidebar.html", function(data){
    $("#notification-count"),function(){
    $.ajax({
      url: "./PHP/SW_mensaje.php",
      type: "POST",
      data:{
        accion :'__find'
      },
      dataType :" JSON",
      success: function(data){
            $("#notification-count").remove();                  
            //$("#notification-latest").show();
            //$("#notification-latest").html(data);
        
      },     
    });
  }
}
  
  )}
  
)