$(function(){
    // Define variables
    var activeNote = 0;
    var editNote = false;
    
    // Load notes when page loads using AJAX call to loadnotes.php
    $.ajax({
        url : "loadnotes.php",
        success : function(data){
            $('#notes').html(data);
            clickonNote();
            clickonDelete();
        },
        error : function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
            $("#alert").fadeIn();
        }
    });
})