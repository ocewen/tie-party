$(function() {
    
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

});