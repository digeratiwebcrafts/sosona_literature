$(function(){

  $('.view-password-icon').click(function(){
       
        if($(this).hasClass('icon-eye-blocked2')){
           
          $(this).removeClass('icon-eye-blocked2');
          
          $(this).addClass('icon-eye2');
          
          $('.pr-form-control-icon').attr('type','text');
            
        }else{
         
          $(this).removeClass('icon-eye2');
          
          $(this).addClass('icon-eye-blocked2');  
          
          $('.pr-form-control-icon').attr('type','password');
        }
    });
});
$(function(){

  $('.new-password-icon').click(function(){
       
        if($(this).hasClass('icon-eye-blocked2')){
           
          $(this).removeClass('icon-eye-blocked2');
          
          $(this).addClass('icon-eye2');
          
          $('.npr-form-control-icon').attr('type','text');
            
        }else{
         
          $(this).removeClass('icon-eye2');
          
          $(this).addClass('icon-eye-blocked2');  
          
          $('.npr-form-control-icon').attr('type','password');
        }
    });
});
$(function(){

  $('.confirm-password-icon').click(function(){
       
        if($(this).hasClass('icon-eye-blocked2')){
           
          $(this).removeClass('icon-eye-blocked2');
          
          $(this).addClass('icon-eye2');
          
          $('.cpr-form-control-icon').attr('type','text');
            
        }else{
         
          $(this).removeClass('icon-eye2');
          
          $(this).addClass('icon-eye-blocked2');  
          
          $('.cpr-form-control-icon').attr('type','password');
        }
    });
});

// autohide alert
$(function() {
    // setTimeout() function will be fired after page is loaded
    // it will wait for 5 sec. and then will fire
    // $("#successMessage").hide() function
    setTimeout(function() {
      $('.alert').fadeOut('fast');
    }, 5000);
});

//alert to date not less than from date
function myFunction() {
    var startDate = new Date($('#startDate').val());
    var endDate = new Date($('#endDate').val());

    if (endDate < startDate){
    alert('To Date not less than From Date');
    }
}