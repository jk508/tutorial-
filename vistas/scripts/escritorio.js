function init(){
    
    $("#principal").show();
    $("#secundario").hide();
    $("#formulario_tarea").on("submit",function(e){
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

function buscar(){
   var palabra=$("#buscador").val();
  
    $.post("../ajax/tarea.php?op=buscar",
    {"palabra":palabra},
    function(data){
       
        window.location="escritorio.php?id="+data; 
       
        
    }
    );

  
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
   
   window.location="tarea.php";
   
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

function tarea(e){

   
}

init();