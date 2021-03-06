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
        });
    });
    
    
    // Update note using AJAX call to updatenote.php
    $("#textarea").keyup(function(){
        // AJAX call to update the task of id activenote
        $.ajax({
            url : 'updatenote.php',
            type : "POST",
            // Sends the content of the current note with ID to php file
            data : {
                note : $(this).val(),
                id : activeNote
            },
            success : function(data){
                if(data == 'error'){
                    $('#alertContent').text("There was an issue updating the note in the database!");
                    $("#alert").fadeIn();
                }    
            },
            error : function(){
                $('#alertContent').text("Ajax Call Error. Please try again later.");
                $("#alert").fadeIn(); 
            }
        });
    });
    
    
    // Click on all notes button
    $("#allNotes").click(function(){
        $.ajax({
            url: "loadnotes.php",
            success: function (data){
                $('#notes').html(data);
                showHide(["#addNote", "#edit", "#notes"], ["#allNotes", "#notePad"]);
                clickonNote(); 
                clickonDelete();
            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                $("#alert").fadeIn();
            }
        });
    });
    
    // Click on done after editing and load notes again
    $("#done").click(function(){
        editMode = false;
        // Expand notes
        $(".noteheader").removeClass("col-xs-7 col-sm-9");
        // Show hide elements
        showHide(["#edit"],[this, ".delete"]);
    });
    
    // Click on edit 
    $("#edit").click(function(){
        editMode = true;
        // Reduce width of notes
        $(".noteheader").addClass("col-xs-7 col-sm-9");
        // Show hide elements
        showHide(["#done", ".delete"],[this]);
    });
    
    
    // FUNCTIONS
    // Click on note
    function clickonNote(){
        $('#noteheader').click(function() {
            if(!editMode){
                // Update activeNote variable to ID of note
                activeNote = $(this).attr("id");
                // Fill textarea
                $("textarea").val($(this).find('.text').text());
                // Show hide elements
                showHide(["#notePad", "#allNotes"], ["#notes", "#addNote", "#edit", "#done"]);
                $('#textarea').focus();
            }
        });
    }
    
    // Click on delete
    function clickonDelete(){
        $(".delete").click(function() {
            var deleteButton = $(this);
            // Send AJAX call to delete note
            $.ajax({
                url : "deletenote.pho",
                type : "POST",
                // Send the id of the note to be deleted
                data : {id:deleteButton.next().attr("id")},
                success : function(data){
                    if(data == 'error'){
                        $('#alertContent').text("There was an issue delete the note from the database!");
                        $("#alert").fadeIn();    
                    } else {
                        deleteButton.parent().remove();
                    }   
                },
                error : function(){
                    $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn();
                }
            });
        });
    }
    
    // showHide function
    function showHide(array1, array2){
        for(i=0; i<array1.length; i++){
            $(array1[i]).show();   
        }
        for(i=0; i<array2.length; i++){
            $(array2[i]).hide();   
        }
    }
})