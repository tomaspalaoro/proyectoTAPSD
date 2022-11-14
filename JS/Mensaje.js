$( document ).ready(function() {
console.log("Ready!")

$.ajax({
    url: "",
    type: "POST",
    data:{
        accion: "contador_no_leidas",
        
    },
    datatype:'json',
    
    success: function(data){
        $("#conador").html(Response.data)
    
    },
    error: function(){}           
  });
});