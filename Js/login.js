
$( "#login" ).submit(function( event ) {
    event.preventDefault();
    var uname = $("#user").val().trim();
    var upass = $("#pass").val().trim();

    $.ajax({
        url:'../Php/login.php',
        method:'post',
        data:{uname : uname,upass : upass},
        dataType:'text',
        success:function(data)
        {
          try 
          {
            const obj = JSON.parse(data);
            if(obj.status === "1")
            {
              $(this).unbind("submit");
              localStorage.setItem("token", obj.token);
              window.location.replace("../Html/profile.html");
            }
          } 
          catch (e) 
          {
            
            $("html, body").animate({scrollTop: 0}, 250);   
            $("#error").css("visibility", "visible");
            $("#error").text('Please Enter Proper Credentials');
          
          }
        }
        
    });

});