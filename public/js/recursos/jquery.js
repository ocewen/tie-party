$(function() {
    
    var check_form = 0;
    var check_form2 = 0;
    
    $('#login-nav').click(function(e){
        e.preventDefault();
        $('.modal-login').toggle();
        $(document).mouseup(function(e) {
            var container = $('.modal-login #interno');
            var btn = $('#login-nav');
            if (!btn.is(e.target) && !container.is(e.target) && container.has(e.target).length === 0) {
              $('.modal-login').hide();
            }
        });
    });

    $('.modal-login i.fa.fa-times').click(function(){
        $('.modal-login').hide();
    });

    $('.single .btn-crear-fiesta').click(function(){
        $('.single #modal-crear-fiesta').show();
        $(document).mouseup(function(e) {
            var container = $('.single #modal-crear-fiesta #interno');
            if (!container.is(e.target) && container.has(e.target).length === 0) {
              $('.single #modal-crear-fiesta').hide();
            }
        });
    });

    $('.single i.fa.fa-times').click(function(){
        $('.single #modal-crear-fiesta').hide();
    });

    $('#btn-buscar').click(function(e){
        e.preventDefault();
        $('#modal-buscar-fiesta').show();
        $(document).mouseup(function(e) {
            var container = $('#modal-buscar-fiesta #interno');
            if (!container.is(e.target) && container.has(e.target).length === 0) {
              $('#modal-buscar-fiesta').hide();
            }
        });
    });
    $('#btn-buscar-servicio').click(function(e){
        e.preventDefault();
        $('#modal-buscar-servicio').show();
        $(document).mouseup(function(e) {
            var container = $('#modal-buscar-servicio #interno');
            if (!container.is(e.target) && container.has(e.target).length === 0) {
              $('#modal-buscar-servicio').hide();
            }
        });
    });
    $('#modal-buscar-servicio i').click(function(){
        $('#modal-buscar-servicio').hide();
    });

    $('#modal-buscar-fiesta i.fa').click(function(){
        $('#modal-buscar-fiesta').hide();
    });


    $('#programar-fiesta').click(function(e){
        e.preventDefault();
        $('#modal-programar-fiesta').show();
        $(document).mouseup(function(e) {
            var container = $('#modal-programar-fiesta #interno');
            if (!container.is(e.target) && container.has(e.target).length === 0) {
              $('#modal-programar-fiesta').hide();
            }
        });
    });
    $('#modal-programar-fiesta i').click(function(){
        $('#modal-programar-fiesta').hide();
    });


    $(document).mouseup(function(e) {
        var container = $('#modal-buscar-amigos #interno');
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          $('#modal-buscar-amigos').hide();
        }
    });

    $('i.fa.fa-bars').click(function(){
        if($('nav').css('right') == "0px"){
            $('nav').animate({right: "-100%"}, 200); 
        } else {
            $('nav').animate({right: "0px"}, 200);     
        }
        $(document).mouseup(function(e) {
            var container = $('nav');
            var logDiv = $('.modal-login #interno');
            var logDivI = $('.modal-login #interno i');
            var logBars = $('i.fa.fa-bars');
            if (!logDivI.is(e.target) && !logBars.is(e.target) && !logDiv.is(e.target) && !container.is(e.target) && container.has(e.target).length === 0) {
              $('nav').animate({right: "-100%"}, 200); 
            }
        });
    });

    $(document).mouseup(function(e) {
        var container = $('.modal-aviso #interno');
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.modal-aviso').hide();
        }
    });
    
    $('.modal-aviso i.fa.fa-times').click(function(){
        $('.modal-aviso').hide();
    })
    
    $('#btn-crear-servicio').click(function(){
        $('#modal-crear-servicio').show();
        $(document).mouseup(function(e) {
            var container = $('#modal-crear-servicio #interno');
            if (!container.is(e.target) && container.has(e.target).length === 0) {
              $('#modal-crear-servicio').hide();
            }
        });
    });
    $('#modal-crear-servicio i.fa.fa-times').click(function(){
        $('#modal-crear-servicio').hide();
    })
    
    
// ------------------------------------------Boton Sidebar

    $('.single-sidebar-image .toggle-icon-sidebar').click(function(){
        if($( window ).width() >= "557" ){
            if($('.single-sidebar').css('left') == '0px'){
                $('.single-sidebar').animate({left: "-269px"}, 200); 
            } else {
                $('.single-sidebar').animate({left: "0px"}, 200);
            }

            $(document).mouseup(function(e) {
                if($('.single-sidebar').css('left') == '0px'){
                var container = $('.single-sidebar');
                    if (!container.is(e.target) && container.has(e.target).length === 0) {
                        $('.single-sidebar').animate({left: "-269px"}, 200);
                        $('.single-sidebar-image .toggle-icon-sidebar').toggleClass('ti-dark');
                        $('.single-sidebar-image .toggle-icon-sidebar').toggleClass('ti-white');
                    }
                }
            });

            $(this).toggleClass('ti-dark');
            $(this).toggleClass('ti-white');
        } else {
            if($('.single-sidebar').css('height') == '90px'){
                $('.single-sidebar').animate({ height: $('.single-sidebar').get(0).scrollHeight}, 200, function(){
                    $('.single-sidebar').height('auto');
                });
                $('.single-sidebar').css('padding','90px 60px 40px 89px');
                // $('.single-sidebar').animate({height: "100%"}, 200);
            } else {
                $('.single-sidebar').animate({height: "90px"}, 200);
                $('.single-sidebar').animate({padding: "0px 60px 0px 89px"}, 50);
            }

            $(this).toggleClass('ti-dark');
            $(this).toggleClass('ti-white');
        }
        
    });



    // ------------------------------------------Boton NAVBAR

    $('.single-nav .toggle-icon-single-navbar').click(function(){
        if($( window ).width() >= "557" ){
            if($('.single-nav').css('left') == '0px'){
                $('.single-nav').animate({left: "-176px"}, 200); 
            } else {
                $('.single-nav').animate({left: "0px"}, 200);
            }
            
            $(document).mouseup(function(e) {
                if($('.single-nav').css('left') == '0px'){
                var container = $('.single-nav');
                    if (!container.is(e.target) && container.has(e.target).length === 0) {
                        $('.single-nav').animate({left: "-176px"}, 200);
                        $('.single-nav .toggle-icon-single-navbar').toggleClass('ti-dark');
                        $('.single-nav .toggle-icon-single-navbar').toggleClass('ti-white');
                    }
                }
            });
            $(this).toggleClass('ti-dark');
            $(this).toggleClass('ti-white');
        } else {
            if($('.single-nav').css('height') == '0px'){
                $('.single-nav').animate({ height: $('.single-nav').get(0).scrollHeight}, 200, function(){
                    $('.single-nav').height('auto');
                });
                $('.single-nav').animate({padding: "0px 60px 30px 75px"}, 50);
            } else {
                $('.single-nav').animate({height: "0px"}, 200);
                $('.single-nav').animate({padding: "0px 60px 0px 75px"}, 50);
            }
            $(this).toggleClass('ti-dark');
            $(this).toggleClass('ti-white');
        }

    });

    // ------------------------------------------
    
    
    // ------------------------------------------REGISTER FORM VALIDATION PRINCIPAL BOI
    
    $('.form-reg-home #nombre').on('focusout', function() {
       if( $(this).val().length < 5 ) {
           $(this).css('border','1pt solid red').next('span').fadeIn('slow');
           return false
           } else {
               $(this).css('border','1pt solid #35353599').next('span').fadeOut('slow');
               check_form = 1;
           }
    });
    
    $('.form-reg-home #apellidos').on('focusout', function() {
       if( $(this).val().length < 5 ) {
           $(this).css('border','1pt solid red').next('span').fadeIn('slow');
           } else {
               $(this).css('border','1pt solid #35353599').next('span').fadeOut('slow');check_form = 1;
           }
    });
    
    $('.form-reg-home #registerEmail').on('focusout', function() {
       if( $(this).val().length < 5 ) {
           $(this).css('border','1pt solid red').next('span').fadeIn('slow');
           } else {
               $(this).css('border','1pt solid #35353599').next('span').fadeOut('slow');check_form = 1;
           }
    });
    
    $('.form-reg-home #password').on('focusout', function() {
       ( $(this).val().length < 5 ) ? $(this).css('border','1pt solid red').next('span').fadeIn('slow') : $(this).css('border','1pt solid #35353599').next('span').fadeOut('slow');check_form = 1;
        if( $(this).val() == $('.form-reg-home #password-confirmation').val() && $(this).val().length >= 5 ) {
            $(this).css('border','1pt solid #35353599').next('span').hide(); 
            $('.form-reg-home #password-confirmation').css('border','1pt solid #35353599').next('span').fadeIn('slow');
            check_form = 1;
        }
    });
    
    $('.form-reg-home #password-confirmation').on('keyup', function() {
       if( $(this).val() != $('.form-reg-home #password').val() ) {
           $(this).css('border','1pt solid red').next('span').fadeIn('slow');
           } else {
               $(this).css('border','1pt solid #35353599').next('span').hide();check_form = 1;
           }
    });
    
    $('.form-reg-home .enviar').on('click', function(e) {
        if((check_form == 0) || ($('#password').val().length < 5) || ($('#password-confirmation').val().length < 5) || ($('#apellidos').val().length < 5) || ($('#nombre').val().length < 5)) {
            e.preventDefault();
            $('#js-modal-form').show();
            } else {
                $('.form-reg-home').submit();
            }
    });
    // ------------------------------------------
    
    // ------------------------------------------REGISTER EMPRESA FORM VALIDATION PRINCIPAL BOI
    
    $('#nombre-empresa').on('focusout', function() {
       if( $(this).val().length < 5 ) {
           $(this).css('border','1pt solid red').next('span').fadeIn('slow');
           return false
           } else {
               $(this).css('border','1pt solid #35353599').next('span').fadeOut('slow');
               check_form2 = 1;
           }
    });
    
    $('#apellidos-empresa').on('focusout', function() {
       if( $(this).val().length < 2 ) {
           $(this).css('border','1pt solid red').next('span').fadeIn('slow');
           } else {
               $(this).css('border','1pt solid #35353599').next('span').fadeOut('slow');check_form2 = 1;
           }
    });
    
    $('#registerEmail-empresa').on('focusout', function() {
       if( $(this).val().length < 5 ) {
           $(this).css('border','1pt solid red').next('span').fadeIn('slow');
           } else {
               $(this).css('border','1pt solid #35353599').next('span').fadeOut('slow');check_form2 = 1;
           }
    });
    
    $('#password-empresa').on('focusout', function() {
       ( $(this).val().length < 5 ) ? $(this).css('border','1pt solid red').next('span').fadeIn('slow') : $(this).css('border','1pt solid #35353599').next('span').fadeOut('slow');check_form2 = 1;
        if( $(this).val() == $('#form-empresa #password-confirmation-empresa').val() && $(this).val().length >= 5 ) {
            $(this).css('border','1pt solid #35353599').next('span').hide(); 
            $('#form-empresa #password-confirmation-empresa').css('border','1pt solid #35353599').next('span').fadeIn('slow');
            check_form2 = 1;
        }
    });
    
    $('#password-confirmation-empresa').on('keyup', function() {
       if( $(this).val() != $('#form-empresa #password-empresa').val() ) {
           $(this).css('border','1pt solid red').next('span').fadeIn('slow');
           } else {
               $(this).css('border','1pt solid #35353599').next('span').hide();check_form2 = 1;
           }
    });
    
    $('#form-empresa .enviar').on('click', function(e) {
        if((check_form2 == 0) || ($('#password-empresa').val().length < 5) || ($('#password-confirmation-empresa').val().length < 5) || ($('#apellidos-empresa').val().length < 2) || ($('#nombre-empresa').val().length < 5)) {
            e.preventDefault();
            $('#js-modal-form').show();
            } else {
                $('#form-empresa').submit();
            }
    });
    
    $('#subirfotofiesta').on('submit', function(e) {
       var fsize = $('#filefiesta')[0].files[0].size / 1024;
       if(fsize > 5000) {
           alert('ERROR \n El tamaño de la foto es mayor de 5MB');
        e.preventDefault();    
       }
    });
    
    $('.borrar_tik').on('click', function(e) {
       if(confirm('¿Está seguro de que desea borrar?')){
           
       } else {
           e.preventDefault();
       }
    });
    // ------------------------------------------

});