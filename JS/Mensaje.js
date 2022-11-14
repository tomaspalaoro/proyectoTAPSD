$( document ).ready(function() {
console.log("Ready!")

$.ajax({
    url: "./PHP/SW_mensaje.php",
    type: "POST",
    data:{
        accion: "contador_no_leidas",
        
    },
    datatype:'json',
    
    success: function(data){},
    error: function(){}           
  });
});