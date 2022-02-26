
    var email = $("#masp"); // verificação do email
    email.blur(function() {   
        $.ajax({ 
            url: '../../model/pessoas/verificarMasp.php', 
            type: 'POST', 
            data:{"email" : email.val()}, 
            success: function(data) { 
                data = $.parseJSON(data); 
                $("#resposta").text(data.email);   
            }
        }); 
    }); 
                                   
