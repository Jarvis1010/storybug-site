function getBuddy(parameters){
    $.getJSON("request.php", parameters).done(function(data){
       if (data[0].hasOwnProperty('accepted')){
           if (data[0].accepted===null){
                $("#buddyRequest").text("Waiting request");
                $('#buddyRequest').prop('disabled', 'disabled');
           }else if (data[0].accepted===1){
               $("#buddyRequest").text("UnBuddy"); 
           }
       }
       console.log("FIRED");
   });
}

$(document).ready(function(){
   var user = $("#username").text();
   
   getBuddy({username:user,querytype:'select'});   
    $("#buddyRequest").click(function(){ 
        getBuddy({username:user,querytype:'insert'});
    });
    
    
});

