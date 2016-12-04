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