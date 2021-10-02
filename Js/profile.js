$("#update").click(function(){
    var phone = $("#phone").val().trim();
    var addr = $("#addr").val().trim();
    $.ajax({
        url:'http://guvi-task-mathesh.herokuapp.com/Php/update.php',
        method:'post',
        data:{phone : phone,addr : addr},
        dataType:'text',
        success:function(data)
        {
           if(data === "1")
           {
               alert("Data has been Successfully Updated");
           }
           else if(data === "0")
           {
                alert("Ouch!!! Something went wrong. Please login again!!!");
                window.location.replace("http://guvi-task-mathesh.herokuapp.com/Html/index.html");
           }
           else if(data === "Please Fill the Form Properly")
           {
              alert("Please Fill the Form Properly");
           }
           else
           {
                alert("Wrong Request!! Session Timed Out...");
                window.location.replace("http://guvi-task-mathesh.herokuapp.com/Html/index.html");
           }
        }
    });
  }); 

  $("#logout").click(function(){
    var logout = "Logout";
    $.ajax({
        url:'http://guvi-task-mathesh.herokuapp.com/Php/logout.php',
        method:'post',
        data:{logout : logout},
        dataType:'text',
        success:function(data)
        {
            alert("Logged Out!!");
            window.location.replace("http://guvi-task-mathesh.herokuapp.com/Html/index.html");
        }
    }); 
}); 