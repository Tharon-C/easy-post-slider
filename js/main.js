jQuery(document).ready(function() {
var $ = jQuery;
        
   

    //grab the width and calculate left value
    var item_width = $('#ps-slides li').outerWidth(); 
    var left_value = item_width * (-1); 
        
    //move the last item before first item, just in case user click prev button
    $('#ps-slides li:first').before($('#ps-slides li:last'));
    
    //set the default item to the correct position 
    $('#ps-slides ul').css({'left' : left_value});

    //if user clicked on prev button
    $('#ps-prev').click(function() {

        //get the right position            
        var left_indent = parseInt($('#ps-slides ul').css('left')) + item_width;

        //slide the item            
        $('#ps-slides ul:not(:animated)').animate({'left' : left_indent}, 200,function(){    

            //move the last item and put it as first item               
            $('#ps-slides li:first').before($('#ps-slides li:last'));           

            //set the default item to correct position
            $('#ps-slides ul').css({'left' : left_value});
        
        });

        //cancel the link behavior            
        return false;
            
    });

 
    //if user clicked on next button
    $('#ps-next').click(function() {
        
        //get the right position
        var left_indent = parseInt($('#ps-slides ul').css('left')) - item_width;
        
        //slide the item
        $('#ps-slides ul:not(:animated)').animate({'left' : left_indent}, 200, function () {
            
            //move the first item and put it as last item
            $('#ps-slides li:last').after($('#ps-slides li:first'));                  
            
            //set the default item to correct position
            $('#ps-slides ul').css({'left' : left_value});
        
        });
                 
        //cancel the link behavior
        return false;
        
    });        
    
    //if mouse hover, pause the auto rotation, otherwise rotate it
    $('#ps-slides').hover(
        
        function() {
            clearInterval(run);
        }, 
        function() {
            run = setInterval('rotate', speed);   
        }
    ); 
      
//a simple function to click next link
//a timer will call this function, and the rotation will begin :)  
//rotation speed and timer
    var speed = 4000;
    var run = setInterval(rotate, speed);

function rotate() {
    $('#ps-next').click();
}

$('.detail').hide();
$('#ps-team-detail').hide();

$('.person').click(
    function() {
    var person = $(this);
    var selected = $(person).data('name');
    console.log(selected);  

    $('#ps-team-detail').slideDown();
    $('.detail').fadeOut(900);
    $('#ps-team-detail').children(".detail" ).each( function( index, element ){    
            if ( $(this).attr('id') == selected) {
                $(this).fadeIn(900);
            } 
        });
    });
});

      
  