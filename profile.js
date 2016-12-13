// AJAX Call to updateusername.php
$("updateusernameform").submit(function(event){
    // Prevent default processing
    event.preventDefault();
    // Collect user inputs
    var datatopost = $(this).serializeArray();
    // Send collected inputs to updateusername.php using AJAX
    $.ajax({
        url: "updateusername.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateusernamemessage").html(data);
            } else {
                location.reload();
            }
        },
        error: function(){
            $("#updateusernamemessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");    
        } 
    });
});


// Ajax call to updatepassword.php
$("updatepasswordform").submit(function(event){
    // Prevent default processing
    event.preventDefault();
    // Collect user inputs
    var datatopost = $(this).serializeArray();
    // Send collected inputs to updateusername.php using AJAX
    $.ajax({
        url: "updatepassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updatepasswordmessage").html(data);
            }
        },
        error: function(){
            $("#updatepasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");        } 
    });
});


// Ajax call to updateemail.php
$("updateemailform").submit(function(event){
    // Prevent default processing
    event.preventDefault();
    // Collect user inputs
    var datatopost = $(this).serializeArray();
    // Send collected inputs to updateusername.php using AJAX
    $.ajax({
        url: "updateemail.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateemailmessage").html(data);
            }
        },
        error: function(){
            $("#updateemailmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");        } 
    });
})