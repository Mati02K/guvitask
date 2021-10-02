
$( "#login" ).submit(function( event ) {
    event.preventDefault();
    var uname = $("#user").val().trim();
    var upass = $("#pass").val().trim();

    $.ajax({
        url:'http://guvi-task-mathesh.herokuapp.com/Php/login.php',
        method:'post',
        data:{uname : uname,upass : upass},
        dataType:'text',
        success:function(data)
        {
          if(data === "Please Fill the Form Properly")
          {
            $("html, body").animate({scrollTop: 0}, 250);   
            $("#error").css("visibility", "visible");
            $("#error").text('Some of the Details you entered are not in correct format. Please match the requested format !!!');
  
          }
          else if(data === "1")
          {
            $(this).unbind("submit");
            alert("Login Successfull. Taking you to the world of GUVI");
            window.location.replace("http://guvi-task-mathesh.herokuapp.com/Html/profile.php");
          }
          else
          {
            $("html, body").animate({scrollTop: 0}, 250);   
            $("#error").css("visibility", "visible");
            $("#error").text('Please Enter Proper Credentials');
          }
  
        }
        
    });

});