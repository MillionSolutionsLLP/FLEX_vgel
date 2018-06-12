require('./bootstrap');
//window.Vue = require('vue');




$( document ).ready(function() {
  
   
setInterval(function(){
   var date = new Date();
   var currentTime = new Date ( );
    var currentHours = currentTime.getHours ( );
    var currentMinutes = currentTime.getMinutes ( );
    var currentSeconds = currentTime.getSeconds ( );

    // Pad the minutes and seconds with leading zeros, if required
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

    // Choose either "AM" or "PM" as appropriate
    var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

    // Convert the hours component to 12-hour format if needed
    currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

    // Convert an hours component of "0" to "12"
    currentHours = ( currentHours == 0 ) ? 12 : currentHours;

    // Compose the string for display
    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
    
    
    $("#clock").html(currentTimeString);   
}, 1000);

});



$("#error").slideUp("5");


var master = 0;
var keycount = 0;


var news=0;
var tender=0;
var doc=0;

var pub=0;
var edit=0;

$( "body" ).on( "keydown", function( event ) {



if(event.altKey){

event.preventDefault();

if(event.which == 80 ){
  edit=0;
  pub=1;

}

if(event.which == 69 ){
  edit=1;
  pub=0;
}



if(pub ==1){


if(event.which == 78 ){

  var link="http://"+window.location.hostname + "/admin/NM/add/news" ; 
  getMsModLink(link);pub=0;
}


if(event.which == 84 ){
 var link="http://"+window.location.hostname + "/admin/TM/add/tender" ; 
  getMsModLink(link);pub=0;
}

if(event.which == 68 ){
 var link="http://"+window.location.hostname + "/admin/DM/add/document" ; 
  getMsModLink(link);pub=0;
}



}







}



//console.log(master);
//console.log( event.type + ": " +  event.which);
});




$("body").on("click",".ms-js-btn",function (e){
e.preventDefault();

var tab2 =$(this).attr('ms-js-target');
    

   
   tab2='a[href="#'+tab2+'"]';
//   $('.tab-pane .active').tab('hide');
// //  $(tab2).tab('show');



  $(tab2).tab('show');


});


function loadingOn() {
  
 $(".loading").fadeIn( "slow", function() {
    // Animation complete
  });;




}


function loadingOff() {
  
   $(".loading").fadeOut( "slow", function() {
    // Animation complete
  });

}

$("body").on("click",".ms-mod-btn",function (){


var link= $(this).attr('ms-live-link');



getMsModLink(link);

//alert($(this).attr('ms-live-link'));

});





function getMsModLink(link) {
$(".ms-mod-tab").slideUp("slow");
loadingOn();


$.ajax({
                url: link,  //server script to process data
                type: 'GET',
                xhr: function() {  // custom xhr
                    myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ // if upload property exists
                       // myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                    }
                    return myXhr;
                },
                // Ajax events
                success: completeHandler = function(data) {
                 // alert("Your action taken succefully.!");
                 
                // console.log("msg" in data);
                $(".ms-mod-tab").html(data);
                $(".ms-mod-tab").slideDown("fast");
               loadingOff();

              
                },
                error: errorHandler = function(xhr, status, error) {
                       // console.log(xhr);
                
                   // alert("Something went wrong!"+ "Error is : "+status);
                },
                cache: false,
                contentType: false,
                processData: false
            }, 'json');

}



$("body").on("click",".ms-live-btn",function (){


var link= $(this).attr('ms-live-link');

$(".ms-live-tab").slideUp();
loadingOn();
$.ajax({
                url: link,  //server script to process data
                type: 'GET',
                xhr: function() {  // custom xhr
                    myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ // if upload property exists
                       // myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                    }
                    return myXhr;
                },
                // Ajax events
                success: completeHandler = function(data) {
                 // alert("Your action taken succefully.!");
                 
                // console.log("msg" in data);
                $(".in").removeClass("in");
                $(".ms-live-tab").html(data);
                $(".ms-live-tab").slideDown();
                loadingOff();

              
                },
                error: errorHandler = function(xhr, status, error) {
                       // console.log(xhr);
                
                   // alert("Something went wrong!"+ "Error is : "+status);
                },
                cache: false,
                contentType: false,
                processData: false
            }, 'json');

//alert($(this).attr('ms-live-link'));

});

$("body").on("submit","form",function (){

event.preventDefault();

});


$("form").on("click",".ms-form-btn",function (){
event.preventDefault();
var link= $('.ms-form').attr('action');

            $.ajax({
                url: link,  //server script to process data
                type: 'POST',
                xhr: function() {  // custom xhr
                    myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ // if upload property exists
                       // myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                    }
                    return myXhr;
                },
                // Ajax events
                success: completeHandler = function(data) {
                 // alert("Your action taken succefully.!");
                 
                // console.log("msg" in data);
              	//console.log(data);
              //data=$.parseJSON(data);
              //console.log(data);


                console.log(data);
                $a =1;
                if($a==0){




                  if("redirect" in data){
                    
                     //localStorage.LastPage = data.redirect;
                    location.replace(data.redirect);
                   
                  //  console.log(data->redirect);
                }else{
                      
                      if ("redirectData" in data) {

                        getMsModLink(data.redirectData);

                      }else{
                        //location.reload();
                      }
                    
                }


                }

                
               // alert(data.redirect);
                  location.replace(data.redirect);
                },
                error: errorHandler = function(xhr,status, error) {
                // console.log(xhr.responseJSON.msg);
                 var html="";
                 jQuery.each(xhr.responseJSON.msg,function (item, index){

                 	html+='<span><i class="fa fa-exclamation" aria-hidden="true"></i> '+item+'</span><br>';
           			 $("#error").html(html);
           			 $("#error").slideDown();


                 });
                
                    //alert("Something went wrong!"+ "Error is : "+status);
                },
                // Form data
                data: new FormData($('.ms-form')[0]),
                // Options to tell jQuery not to process data or worry about the content-type
                cache: false,
                contentType: false,
                processData: false
            }, 'json');
});


