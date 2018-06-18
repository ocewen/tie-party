$(function() {

	$('#masAmigos').click(function() {
		$('#modal-buscar-amigos').show();
	});

	$('#modal-buscar-amigos i').click(function() {
		$('#modal-buscar-amigos').hide();
	});

	//REGISTRO
	//-----------
	$('#registerEmail').on('input', function(tecla) {
		var token = $('meta[name="csrf-token"]').attr('content');
		var email = $('#registerEmail').val();
			$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				method: "POST",
				url: "/register/comprobar",
				dataType: "JSON",
				data: {
					_token: token,
					email: email
				},
			}).done(
				function(json) {
					$('#email-error').show();
					$('#registerEmail').css("border-color", "red");
			}).fail(
				function(json) {
					$('#email-error').hide();
					$('#registerEmail').css("border-color", "#ced4da");
			});
	});
	//-----------
	//-----------


	//PROGRAMAR FIESTA -> SERVICIOS
	//-----------
	$('.servicio_fiestas').click(function() {
		$(this).closest('li').hide();
		var token = $('meta[name="csrf-token"]').attr('content');
		var nombre = $(this).text();
		var id_servicio = $(this).attr('datos');
		var id_fiesta = $('#fiesta_nombre').attr('datos');

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			method: "POST",
			url: "/anadir/servicio",
			dataType: "JSON",
			data: {
				id_servicio: id_servicio,
				id_fiesta: id_fiesta
			},
		}).done(
			function(json) {
				$('.mis-servicios-anadidos ul').append("<li><strong class='anadido-servicio' datos="+id_servicio+" style='cursor: pointer;'>"+nombre+"</strong></li>");
		}).fail(
			function(jsonjqXHR, textStatus) {
				console.log(id_servicio);
				console.log(id_fiesta);
				console.log(jsonjqXHR);
		});
	});
	//-----------
	//-----------

	//PROGRAMAR FIESTA -> HERRAMIENTAS
	//-----------
	$('.herramienta_fiestas').click(function() {
		var herramienta = $(this).get();
		$(this).closest('li').hide();
		var token = $('meta[name="csrf-token"]').attr('content');
		var nombre = $(this).text();
		var id_herramienta = $(this).attr('datos');
		var id_fiesta = $('#fiesta_nombre').attr('datos');

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			method: "POST",
			url: "/anadir/herramienta",
			dataType: "JSON",
			data: {
				id_herramienta: id_herramienta,
				id_fiesta: id_fiesta
			},
		}).done(
			function(json) {
				$('.mis-herramientas-anadidos ul').append("<li><strong class='anadido-herramienta' datos="+id_herramienta+" style='cursor: pointer;'>"+nombre+"</strong></li>");
		}).fail(
			function(jsonjqXHR, textStatus) {
				console.log(id_herramienta);
				console.log(id_fiesta);
				console.log(jsonjqXHR);
		});
	});
	//-----------
	//-----------

	//VER FIESTAS -> PERSONALES
	//-----------
	$('#seePersonal').on('click', function() {

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			method: "GET",
			url: "/fiesta/personal",
			dataType: "JSON",
			data: ""
		}).done(
			function(json) {
				$('.single-list').empty();
				var content = '';
				for(var i = 0; i < json.length; i++) {
					content += '<div class="single-list-item '+json[i].tipo+'-type"><i class="fa fa-crown"></i><div class="image-box single-list-image"><a href="/fiesta/fiesta?fiesta='+json[i].id+'"><img src="'+json[i].foto+'" alt="Imagen de ejemplo"></a></div><div class="single-list-text"><span>'+json[i].nombre+'</span><div class="party-options"><a href="/fiesta/fiesta?fiesta='+json[i].id+'"><i class="fa fa-edit"></i></a><a href="/fiesta/delete?id='+json[i].id+'"><i class="fa fa-trash"></i></a></div></div></div>';
				}
				$('.single-list').html(content);
		}).fail(
			function(jqXHR, textStatus) {
				// alert('mal');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	//-----------
	//-----------

	//VER FIESTAS -> PARTICIPACIONES
	//-----------
	$('#seeParticipa').on('click', function() {

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			method: "GET",
			url: "/fiesta/participa",
			dataType: "JSON",
			data: ""
		}).done(
			function(json) {
				$('.single-list').empty();
				var content = '';
				for(var i = 0; i < json.length; i++) {
					content += '<div class="single-list-item '+json[i].tipo+'-type"><div class="image-box single-list-image"><img src="'+json[i].foto+'" alt="Imagen de ejemplo"></div><div class="single-list-text"><span>'+json[i].nombre_fiesta+'<div class="party-options"></span><a title="Dejar fiesta" href="/fiesta/salir?fUyEi='+json[i].id+'"><i class="fa fa-door-open"></i></a></div></div></div>';
				}
				$('.single-list').html(content);
		}).fail(
			function(jqXHR, textStatus) {
				alert('mal');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	//-----------
	//-----------

	//VER FIESTAS -> TODAS
	//-----------
	$('#seeAll').on('click', function() {

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			method: "GET",
			url: "/fiesta/user/all",
			dataType: "JSON",
			data: ""
		}).done(
			function(json) {
				$('.single-list').empty();
				var content = '';
				for(var i = 0; i < json.length; i++) {
					for(var x = 0; x < json[i].length; x++) {
						if(i == 0)
							content += '<div class="single-list-item '+json[i][x].tipo+'-type"><i class="fa fa-crown"></i><div class="image-box single-list-image"><img src="../images/public_images/fiesta2.jpg" alt="Imagen de ejemplo"></div><div class="single-list-text"><span>'+json[i][x].nombre+'</span><div class="party-options"><a href="/fiesta/edit?id='+json[i][x].id+'"><i class="fa fa-edit"></i></a><a href="/fiesta/delete?id='+json[i][x].id+'"><i class="fa fa-trash"></i></a></div></div></div>';
						if(i == 1)
							content += '<div class="single-list-item '+json[i][x].tipo+'-type"><div class="image-box single-list-image"><img src="'+json[i][x].foto+'" alt="Imagen de ejemplo"></div><div class="single-list-text"><span>'+json[i][x].nombre_fiesta+'</span><a href="/fiesta/delete?id='+json[i][x].id+'"><i class="fa fa-door-open"></i></a></div></div>';
					}
				}
				$('.single-list').html(content);
		}).fail(
			function(jqXHR, textStatus) {
				alert('mal');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	//-----------
	//-----------

	//VER AMIGOS -> FIESTA
	//-----------
	$('#seeFriends').on('click', function() {

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			method: "GET",
			url: "/amigos",
			dataType: "JSON",
			data: ""
		}).done(
			function(json) {
				$('.single-list').empty();
				var content = '';
				for( var i = 0; i < json.length; i++)
				{
					content += '<div class="single-list-item"><div class="image-box single-list-image"><a href=""><img class="backup_picture" src="'+json[i].foto+'" alt="Imagen de ejemplo"></a></div><div class="single-list-text"><a href="#"><span> ' + json[i].email_user2 +'  </span></a><div class="party-options"><a title="Borrar amigo" href="/delete/friend?fDpS='+json[i].relation+'"><i class="fa fa-trash"></i></a></div></div></div>';
				}
				content += '';
				$('.single-list').html(content);
		}).fail(
			function(jqXHR, textStatus) {
				alert('mal');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	//-----------
	//-----------
	
	//VER AMIGOS -> SINGLE
	//-----------
	$('#inv-single').on('click', function() {

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		var fiesta = $('#single-content').attr('mm');
		$.ajax({
			method: "GET",
			url: "/amigos/getnof",
			dataType: "JSON",
			data: {
				fiesta : fiesta
			}
		}).done(
			function(json) {
				$('.single-list').empty();
				var content = '';
				for( var i = 0; i < json.length; i++)
				{
					content += '<div class="single-list-item"><div class="image-box single-list-image"><a href=""><img class="backup_picture" src="'+json[i].foto+'" alt="Imagen de ejemplo"></a></div><div class="single-list-text"><a href="#"><span> ' + json[i].email_user2 +'  </span></a><div class="party-options"><a title="Invitar amigo" href="/send/inv?mail='+json[i].email_user2+'&fPi='+fiesta+'"><i class="fa fa-user-plus"></i></a></div></div></div>';
				}
				content += '';
				$('.single-list').html(content);
		}).fail(
			function(jqXHR, textStatus) {
				alert('mal');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	//-----------
	//-----------

	//BUSCAR AMIGOS -> FIESTA
	//-----------
	$('#sendFriend').on('click', function(e) {
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var email_name = $('#amigo_name').val();
		$.ajax({
			method: "POST",
			url: "/amigos/buscar",
			dataType: "JSON",
			data: {
				email : email_name
			}
		}).done(
			function(json) {
				if(json == 'dup')
				{
					alert('Ya has enviado una petición a este usuario o tienes pendiente su petición');
				} else {
					alert('Se ha enviado una petición de amistad al usuario ' + email_name);
				}
		}).fail(
			function(jqXHR, textStatus) {
				alert('No se ha encontrado al usuario ' + email_name + ' o ya es tu amigo');
				exit(0);
				// console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	//-----------
	//-----------

	//BUSCAR FIESTA -> FIESTA
	//-----------

	$('#fiesta_name').on('keyup', function(e) {

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var dInput = $(this).val();
		$.ajax({
			method: "GET",
			url: "/fiesta/buscar",
			dataType: "JSON",
			data: {
				fiesta : dInput
			}
		}).done(
			function(json) {
				var datos = '';
				for(var i = 0; i < json.length; i++){
					datos += '<li class="manejar-ajax" style="cursor: pointer;">'+json[i].nombre+'</li>';
				}
				if(dInput == ''){$('#search_ulajax').html('');}
				else { $('#search_ulajax').html(datos);}
		}).fail(
			function(jqXHR, textStatus) {
				alert('No');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	
	$('#search_ulajax').on('click', '.manejar-ajax', function() {

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var dato = $(this).html();
		$.ajax({
			method: "GET",
			url: "/fiesta/unirse",
			dataType: "JSON",
			data: {
				id : dato
			}
		}).done(
			function(json) {
				window.location.replace('/fiesta/user');
		}).fail(
			function(jqXHR, textStatus) {
				window.location.replace('/fiesta/user');
				console.log( "Request failed: " + jqXHR.statusText );
		});

	});

	//-----------
	//-----------

	//FIESTAS PASADAS -> FIESTA
	//-----------

	$('#lastFiesta').on('click', function() {
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			method: "GET",
			url: "/fiesta/user/pasadas",
			dataType: "JSON",
			data: ""
		}).done(
			function(json) {
				$('.single-list').empty();
				var content = '';
				for(var i = 0; i < json.length; i++) {
					for(var x = 0; x < json[i].length; x++) {
						if(i == 0)
							content += '<div class="single-list-item '+json[i][x].tipo+'-type"><i class="fa fa-crown"></i><div class="image-box single-list-image"><img src="../images/public_images/fiesta2.jpg" alt="Imagen de ejemplo"></div><div class="single-list-text"><span>'+json[i][x].nombre+'</span></div></div></div>';
						if(i == 1)
							content += '<div class="single-list-item '+json[i][x].tipo+'-type"><div class="image-box single-list-image"><img src="../images/public_images/fiesta2.jpg" alt="Imagen de ejemplo"></div><div class="single-list-text"><span>'+json[i][x].nombre_fiesta+'</span></div></div>';
					}
				}
				$('.single-list').html(content);
		}).fail(
			function(jqXHR, textStatus) {
				alert('mal tai');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});

	//-----------
	//-----------

	//AMIGOS INVITAR -> FIESTA
	//-----------

	$('#nombre_invitar').on('keyup', function(e) {

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var dInput = $(this).val();
		
		$.ajax({
			method: "GET",
			url: "/amigos/buscarajax",
			dataType: "JSON",
			data: {
				fiesta : dInput
			}
		}).done(
			function(json) {
				var datos = '';
				for(var i = 0; i < json.length; i++){
					datos += '<li class="manejar-ajax"  mail="'+json[i].email+'" style="cursor: pointer;">'+json[i].nombre+'</li>';
				}
				if(dInput == ''){$('#search_friends').html('');}
				else { $('#search_friends').html(datos);}
		}).fail(
			function(jqXHR, textStatus) {
				alert('No');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	
	$('#search_friends').on('click', '.manejar-ajax', function() {
		var pepe = $('.manejar-ajax').attr('mail');
		alert(pepe);

		$.ajax({
			method: "GET",
			url: "/invitar/mail",
			dataType: "JSON",
			data: {
				fiesta : dInput
			}
		}).done(
			function(json) {
				var datos = '';
				for(var i = 0; i < json.length; i++){
					datos += '<li class="manejar-ajax"  mail="'+json[i].email+'" style="cursor: pointer;">'+json[i].nombre+'</li>';
				}
				if(dInput == ''){$('#search_friends').html('');}
				else { $('#search_friends').html(datos);}
		}).fail(
			function(jqXHR, textStatus) {
				alert('No');
				console.log( "Request failed: " + jqXHR.statusText );
		});

	});

	//-----------
	//-----------


	//VER SOLICITUDES AMIGOS -> FIESTA
	//-----------
	$('#solicitudes').on('click', function() {

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			method: "GET",
			url: "/amigos/solicitudes",
			dataType: "JSON",
			data: ""
		}).done(
			function(json) {
				if(json.length == 0) {
					alert('No tienes solicitudes');
					exit(0);
				}
				
				$('.single-list').empty();
				var content = '<ul class="solicitudes-amistad">';
				
				for( var i = 0; i < json.length; i++)
				{
					content += '<li><img src="' +json[i].foto +'" alt="foto de '+ json[i].nombre_user2 +'"><span class="nombre-solicitud">' + json[i].nombre_user2 + ' ' + json[i].apellidos_user2 + '</span><div class="solicitudes-opciones"> <a href="#" class="aceptarAmigo" mm="'+json[i].id+'"><i class="fas fa-check"></i></a><a href="#" class="borrarAmigo"  mm="'+json[i].id+'"><i class="fas fa-times"></i></a></div></li>';
				}
				content += '</ul>';
				$('.single-list').append(content);
		}).fail(
			function(jqXHR, textStatus) {
				alert('mal');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});

	$('.single-list').on('click', '.aceptarAmigo', function() {

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var mm = $(this).attr('mm');
		$.ajax({
			method: "GET",
			url: "/amigos/aceptar",
			dataType: "JSON",
			data: {
				id_amistad : mm
			}
		}).done(
			function(json) {
				alert('Amigo aceptado');
				window.location.replace('/fiesta/user');
		}).fail(
			function(jqXHR, textStatus) {
				alert('No ha sido posible aceptar al contacto');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	
	$('.single-list').on('click', '.borrarAmigo', function() {

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var mm = $(this).attr('mm');
		$.ajax({
			method: "GET",
			url: "/amigos/borrar",
			dataType: "JSON",
			data: {
				id_amistad : mm
			}
		}).done(
			function(json) {
				alert('Solicitud rechazada');
				window.location.replace('/fiesta/user');
		}).fail(
			function(jqXHR, textStatus) {
				alert('No ha sido posible cancelar la solicitud');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	//-----------
	//-----------

	//SERVICIOS BUSCAR -> FIESTA SINGLE
	//-----------
	$('#servicio_name').on('keyup', function() {
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var dInput = $(this).val();
		var idFiesta = $('#single-content').attr('mm');
		
		$.ajax({
			method: "GET",
			url: "/servicio/buscar",
			dataType: "JSON",
			data: {
				servicio : dInput,
				idfiesta : idFiesta
			}
		}).done(
			function(json) {
				var datos = '';
				for(var i = 0; i < json.length; i++){
					datos += '<li class="manejar-ajax" qq="'+json[i].id+'" style="cursor: pointer;">'+json[i].nombre+'</li>';
				}
				if(dInput == ''){$('#search_servjax').html('');}
				else { $('#search_servjax').html(datos);}
		}).fail(
			function(jqXHR, textStatus) {
				alert('No');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});

	$('#search_servjax').on('click', '.manejar-ajax', function() {
		var idServicio = $(this).attr('qq');
		var idFiesta = $('#single-content').attr('mm');

		$.ajax({
			method: "GET",
			url: "/anadir/servicio",
			dataType: "JSON",
			data: {
				id_fiesta : idFiesta,
				id_servicio : idServicio
			}
		}).done(
			function(json) {
				alert('Insertado con éxito');
		}).fail(
			function(jqXHR, textStatus) {
				alert('Ya has añadido este servicio');
		});

	});
	//-----------
	//-----------

	//SERVICIOS CONTRATADOS -> FIESTA SINGLE
	//-----------
	$('.serv_cont').on('click', function() {
		var idFiesta = $('#single-content').attr('mm');
		
		$.ajax({
			method: "GET",
			url: "/servicio/contratados",
			dataType: "JSON",
			data: {
				id_fiesta : idFiesta
			}
		}).done(
			function(json) {
				$('.single-list').empty();
				var user_id = $('#tai-funct').attr('tai');
				var content = '';
				for(var i = 0; i < json.length; i++) {
							content += '<div class="single-list-item servicio-type"></i><div class="image-box single-list-image"><img src="../images/servicios/'+json[i].id_servicio+'" alt="Imagen de ejemplo"></div><div class="single-list-text"><span>'+json[i].nombre+'</span><div class="party-options"><a href="/servicio/delfiesta?fUyEi='+json[i].id_fiesta+'&iNaE='+json[i].id_servicio+'"><i class="fa fa-trash"></i></a></div></div></div>';
				}
				$('.single-list').html(content);
		}).fail(
			function(jqXHR, textStatus) {
				alert('No');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	//-----------
	//-----------

	//SERVICIOS TODOS -> FIESTA SINGLE
	//-----------
	$('#serv_todos').on('click', function() {
		var idFiesta = $('#single-content').attr('mm');
		
		$.ajax({
			method: "GET",
			url: "/servicio/todos",
			dataType: "JSON",
			data: ""
		}).done(
			function(json) {
				$('.single-list').empty();
				var user_id = $('#tai-funct').attr('tai');
				var content = '';
				var desc = '';
				for(var i = 0; i < json.length; i++) {
						(json[i].Descripcion == null) ? desc = '' : desc = json[i].Descripcion;
							content += '<div class="single-list-item servicio-type"></i><div class="image-box single-list-image"><img src="../images/servicios/'+json[i].id+'" alt="Imagen de ejemplo"></div><div class="single-list-text"><span>'+json[i].nombre+'</span><br><span>'+desc+'</span><div class="party-options"><a href="/servicio/ana?iNaE='+json[i].id+'&fUyEi='+idFiesta+'"><i class="fa fa-plus"></i></a></div></div></div>';
				}
				$('.single-list').html(content);
		}).fail(
			function(jqXHR, textStatus) {
				alert('No');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	//-----------
	//-----------

	//LISTA INVITADOS -> FIESTA SINGLE
	//-----------
	$('.lista_invitados').on('click', function() {
		var idFiesta = $('#single-content').attr('mm');

		$.ajax({
			method: "GET",
			url: "/fiesta/fiesta/invitados",
			dataType: "JSON",
			data: {
				id_fiesta : idFiesta
			}
		}).done(
			function(json) {
				$('.single-list').empty();
				var content = '';
				for(var i = 0; i < json.length; i++) {
					content += '<div class="single-list-item"><div class="image-box single-list-image"><img class="backup_picture" src="'+json[i][0].foto+'" onerror="http://homestead.test/images/users/default.jpg" ></div><div class="single-list-text"><span>'+json[i][0].nombre+' '+json[i][0].apellidos+'</span><div class="party-options"><a href="#"><i class="fa fa-user"></i></a></div></div></div>';
				}
				$('.single-list').html(content);
		}).fail(
			function(jqXHR, textStatus) {
				alert('Actualmente no hay invitados');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	//-----------
	//-----------

	//HERRAMIENTAS TODAS -> FIESTA SINGLE
	//-----------
	$('.lista-herramientas').on('click', function() {
		
		$.ajax({
			method: "GET",
			url: "/herramientas/all",
			dataType: "JSON",
			data: ""
		}).done(
			function(json) {
				$('.single-list').empty();
				var content = '';
				for(var i = 0; i < json.length; i++) {
							content += '<div class="single-list-item '+i+'-type"><div class="image-box single-list-image"><img src="'+json[i].url+'" alt="Imagen de ejemplo"></div><div class="single-list-text"><span>'+json[i].nombre_herramienta+'</span><br><span">'+json[i].descripcion+'</span></div></div>';
				}
				$('.single-list').html(content);
		}).fail(
			function(jqXHR, textStatus) {
				alert('No');
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	//-----------
	//-----------

	//VER DATOS FIESTA --> FIESTAS
	//-----------
	$('.view-datos-fiesta').on('click', function() {
		var fIpM = $(this).attr('fipm');
	   $.ajax({
			method: "GET",
			url: "/datos/fiesta",
			dataType: "JSON",
			data: {
				fiesta : fIpM
			}
		}).done(
			function(json) {
				$('#dato-name').append(json[0].nombre);
				$('#dato-direccion').append(json[0].direccion);
				$('#dato-tipo').append(json[0].tipo);
				$('#dato-fecha').append(json[0].fecha);
				$('#dato-hora').append(json[0].hora);
				$('#modal-datos-fiesta').show();
		}).fail(
			function(jqXHR, textStatus) {
				console.log( "Request failed: " + jqXHR.statusText );
		});
	});
	
	$('#modal-datos-fiesta').on('click','.fa-times', function() {
		$('#dato-name').text('Nombre : ');
		$('#dato-direccion').html('Direccion : ');
		$('#dato-tipo').html('Tipo : ');
		$('#dato-fecha').html('Fecha : ');
		$('#dato-hora').html('Hora : ');
		$('#modal-datos-fiesta').hide();
	});
	//-----------
	//-----------

	$('.btn-crear-fiesta-error').on('click', function(e) {
		alert('Ya tienes el límite de fiestas para usuario estándar. \n Por favor, pásate a premium');
		e.preventDefault();
	});

});