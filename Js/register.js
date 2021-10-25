
// Changing Date to text and vice-versa

$("#dob").focus(function(){
    $('#dob').get(0).type = 'date';
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; 
    var yyyy = today.getFullYear();

    if (dd < 10) {
      dd = '0' + dd;
    }

    if (mm < 10) {
      mm = '0' + mm;
    } 
        
    today = yyyy + '-' + mm + '-' + dd;

    $("#dob").attr("max",today);
  }); 

$("#dob").blur(function(){
    $('#dob').get(0).type = 'text';
  }); 


  $( "#register" ).submit(function( event ) {
    event.preventDefault();

    var name = $("#name").val().trim();
    var cno = $("#cno").val().trim();
    var mail = $("#mail").val().trim();
    var dob = $("#dob").val().trim();
    var uname = $("#uname").val().trim();
    var upass = $("#upass").val().trim();
    var ucpass = $("#ucpass").val().trim();
    var addr = $("#addr").val().trim();
    var data;
    if(upass === ucpass)
    {
    $.ajax({
      url:'../Php/adduserdata.php',
      method:'post',
      data:{name : name,cno : cno,mail : mail,dob: dob,uname : uname,upass : upass,addr : addr},
      dataType:'text',
      success:function(data)
      {
        if(data === "Please Fill the Form Properly")
        {
          $("html, body").animate({scrollTop: 0}, 250);   
          $("#error").css("visibility", "visible");
          $("#error").text('Some of the Details you entered are not in correct format. Please match the requested format !!!');

        }
        else if(data === "0")
        {
          $("html, body").animate({scrollTop: 0}, 250);   
          $("#error").css("visibility", "visible");
          $("#error").text('User Record exist already. Please try with different Username or Email...');
        }
        else
        {
          $(this).unbind("submit");
          window.location.replace("../Html/index.html");
        }

      }
      
  });
    }
    else
    {
      $("html, body").animate({scrollTop: 0}, 250);   
      $("#error").css("visibility", "visible");
      $("#error").text('Confirm Password and Password are not matching');
    }

    
  });