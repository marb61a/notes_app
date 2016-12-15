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
            $('#alertContent').text("Ajax Call Error. Please try again later.");
            $("#alert").fadeIn();
        }
    });
    
    
    // Add a new note using AJAX call to createnote.php
    $('#addNote').click(function(){
        $.ajax({
            url : 'createnote.php',
            success : function(data){
                if(data == 'error'){
                    $('#alertContent').text("Error inserting note into database.");
                    $("#alert").fadeIn();    
                } else {
                    // Update activeNote to the ID of the new note
                    activeNote = data;
                    $('#textarea').val("");
                    // Show hide elements
                    showHide(["#notePad", "#allNotes"], ["#notes", "#addNote", "#edit", "#done"]);
                    $('#textarea').focus();
                }  
            },
            error : function(){
                $('#alertContent').text("Ajax Call Error. Please try again later.");
                $("#alert").fadeIn();  
            }
        })
    })
})