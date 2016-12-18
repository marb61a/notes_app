$("#signupform").submit(function(event){
    // Prevent default processing
    event.preventDefault();
    // Collect user inputs
    var datatopost = $(this).serializeArray();
    // Send to signup php file using AJAX
    $.ajax({
        url : "signup.php",
        type : "POST",
        data : datatopost,
        success : function(data){
            if(data){
                $("#signupmessage").html(data);
            }
        },
        error : function(){
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});


// Ajax Call for the login form once it is submitted
$("#loginform").submit(function(event){ 
    // Prevent default processing
    event.preventDefault();
    // Collect user inputs
    var datatopost = $(this).serializeArray();
    // Send to login.php using AJAX
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "success"){
                window.location = "mainpageloggedin.php";
            }else{
                $('#loginmessage').html(data);   
            }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});


// Ajax Call for the forgot password form once it is submitted
$("#forgotpasswordform").submit(function(event){ 
    // Prevent default processing
    event.preventDefault();
    // Collect user inputs
    var datatopost = $(this).serializeArray();
    // Send to signup.php using AJAX
    $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            $('#forgotpasswordmessage').html(data);
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});