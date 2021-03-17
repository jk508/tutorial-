function init(){
    
    $("#login").show();
    $("#creacion").hide();

    $('#registro').click(function(){
        $("#creacion").show();
        $("#login").hide();
    });

    $("#formulario_login").on('submit', function(e)
{
	e.preventDefault();
	logina=$("#username_login").val();
	clavea=$("#password_login").val();

	$.post("../ajax/usuario.php?op=verificar",{"logina":logina, "clavea":clavea},   function(data,status)
        {
            data=JSON.parse(data);
                if (data!="null")
                {
                        $(location).attr("href","escritorio.php?id="+data.id);
                }else{
                        bootbox.alert("Usuario y/o Password incorrectos");
                }
        });
})
    $("#formulario_creacion").on("submit",function(e){
        creacion();
     });
}

function creacion(){

   // e.preventDefault();
  
    logina=$("#username").val();
    clavea=$("#password").val();

    $.post("../ajax/usuario.php?op=insertar",
        {"logina":logina,"clavea":clavea},
        function(data)

    {
       
        if (data!="null")
        {   
            alert(data);
            $("#login").show();
            $("#creacion").hide();         
        }
        else
        {
            alert(data);
        }
    });
}

init();