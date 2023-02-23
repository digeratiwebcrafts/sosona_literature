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
