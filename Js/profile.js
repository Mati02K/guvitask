$( document ).ready(function() {
    
const token = localStorage.getItem('token');

if(token)
{
    console.log('Correct Login');
}
else
{
    location.replace("../Html/403.html");
}
});

// Get User Data
$.ajax({
    url: "../Php/profile.php",
    type: 'POST',
    data:{token:localStorage.getItem("token")},
    dataType: 'text', 
    success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status === "1")
        {
            $("#userid").val(obj.userid);
            $("#name").val(obj.name);
            $("#username").val(obj.uname);
            $("#useremail").val(obj.email);
            $("#phone").val(obj.cno);
            $("#dob").val(obj.dob);
            $("#addr").val(obj.addr);
        }
        else
        {
            location.replace("../Html/403.html");
        }

    }
});



$("#update").click(function(){
    var phone = $("#phone").val().trim();
    var addr = $("#addr").val().trim();
    var username = $("#username").val().trim();
    $.ajax({
        url:'../Php/update.php',
        method:'post',
        data:{phone : phone,addr : addr,uname : username},
        dataType:'text',
        success:function(data)
        {
           if(data === "1")
           {
               alert("Data has been Successfully Updated");
           }
           else
           {
                alert("Wrong Request!! Login Again..");
                window.location.replace("../Html/index.html");
           }
        }
    });
  }); 

  $("#logout").click(function(){
    localStorage.removeItem("token");
    location.replace("../Html/index.html");
}); 