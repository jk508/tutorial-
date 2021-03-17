function init(){
    
    $("#principal").show();
    $("#formulario_tarea").hide();
    $("#guardar").on("click",function(e){
        e.preventDefault();
  
    tarea_1 =$("#tarea").val();
    instrucciones_1 =$("#instrucciones").val();
    
    $.post("../ajax/tarea.php?op=insertar",
        {"tarea":tarea_1,"instrucciones":instrucciones_1},
        function(data)

    {
       
        if (data!="null")
        {   
            alert(data);
            window.location="escritorio.php";   
        }
        else
        {
            alert(data);
        }
    });
     });
 
}

function limpiar(){
	$("#tarea").val("");
	$("#instrucciones").val("");
	
}

function mostrarform(flag){
   limpiar();
    
   $.post("../ajax/tarea.php?op=mostrar",{id : flag},
   function(data,status)
   {
      
       data=JSON.parse(data);
       $("#principal").hide();
       $("#formulario_tarea").show();
       $("#cabeza").hide();
       $("#guardar").hide();
       $("#tarea").val(data.nombre);
       $("#instrucciones").val(data.instrucciones);
      
    })
     
}




function buscar(){
   var palabra=$("#buscador").val();
  
    $.post("../ajax/tarea.php?op=buscar",
    {"palabra":palabra},
    function(data){
      
        window.location="escritorio.php?data="+data; 
      
    
    }
    );

 }
 function regresar(){

    window.location="escritorio.php";
 }

function subir(id){
   
    $.post("../ajax/tarea.php?op=puntaje",
    {"id":id,"puntaje":"+1"},
    function(data){
        document.getElementById("subir").style.backgroundColor= "blue";
        location.reload()
    }
    );
 }

function bajar(id){
   
    $.post("../ajax/tarea.php?op=puntaje",
    {"id":id,"puntaje":"-1"},
    function(data){
        location.reload();
        document.getElementById("bajar").style.backgroundColor= "red";
        
    }
    );
 }

function agregar(){
   
    $("#principal").hide();
    $("#formulario_tarea").show();
    $("#cabeza").hide();
   
}

function countChars(obj){
    var maxLength = 128;
    var strLength = obj.value.length;
    var charRemain = (maxLength - strLength);
    
    if(charRemain < 0){
        document.getElementById("charNum").innerHTML = '<span style="color: red;">You have exceeded the limit of '+maxLength+' characters</span>';
    }else{
        document.getElementById("charNum").innerHTML = charRemain+' characters remaining';
    }
}

function countCharsIns(obj){
    var maxLength = 500;
    var strLength = obj.value.length;
    var charRemain = (maxLength - strLength);
    
    if(charRemain < 0){
        document.getElementById("charNumIns").innerHTML = '<span style="color: red;">You have exceeded the limit of '+maxLength+' characters</span>';
    }else{
        document.getElementById("charNumIns").innerHTML = charRemain+' characters remaining';
    }
}



init();