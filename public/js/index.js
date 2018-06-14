(function($){"use strict";$('.input100').each(function(){$(this).on('blur',function(){if($(this).val().trim()!=""){$(this).addClass('has-val')}
else{$(this).removeClass('has-val')}})})
var input=$('.validate-input .input100');$('.validate-form').on('submit',function(){var check=!0;for(var i=0;i<input.length;i++){if(validate(input[i])==!1){showValidate(input[i]);check=!1}}
return check});$('.validate-form .input100').each(function(){$(this).focus(function(){hideValidate(this)})});function validate(input){if($(input).attr('type')=='email'||$(input).attr('name')=='email'){if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/)==null){return!1}}
else{if($(input).val().trim()==''){return!1}}}
function showValidate(input){var thisAlert=$(input).parent();$(thisAlert).addClass('alert-validate')}
function hideValidate(input){var thisAlert=$(input).parent();$(thisAlert).removeClass('alert-validate')}
var showPass=0;$('.btn-show-pass').on('click',function(){if(showPass==0){$(this).next('input').attr('type','text');$(this).find('i').removeClass('zmdi-eye');$(this).find('i').addClass('zmdi-eye-off');showPass=1}
else{$(this).next('input').attr('type','password');$(this).find('i').addClass('zmdi-eye');$(this).find('i').removeClass('zmdi-eye-off');showPass=0}})})(jQuery)

$( document ).ready(function() {    	

	function getRandomInt(min, max) {
	  min = Math.ceil(min);
	  max = Math.floor(max);
	  return Math.floor(Math.random() * (max - min)) + min; //The maximum is exclusive and the minimum is inclusive
	}

	var n = getRandomInt(1,4);
	$(".aside::before").css("background","url('../img/sidebar-"+n+".jpg')");


	$(".header .left .menu").click(function (){
		$(this).toggleClass('active');
		$(".aside").toggleClass('active');
	});


	$('.datepicker').datepicker();

 	$('.timepicker').mask('00:00:00');

    $("#project").change(function (){

        var data = $(this).val();

        $.ajax({
        url: '/tasks/getUsers',
        type: "GET",
        data: {id : data},
        dataType:'JSON',
        success:function(response){
            console.log("function")
            if(response.error == false){
                $("#usersProject").html(response.html);
            }else{
                console.log("erro");
            }
           
        }
      });
    });

 	// $('.dateshow').mask('00/00/0000');

	// addNewTask();

	// function addNewTask(){
 //      var data = {
        
 //      };
 //      $.ajax({
 //         url: '/tasks/create',
 //        type: "POST",
 //        data: data,
 //        dataType:'JSON',
 //        success:function(response){
 //           $('.time-not-completed').text(response.data);           
 //           $('.time-completed').hide();
 //           $('.time-not-completed').fadeIn();
 //        }
 //      });
 //   }


    // $('#form-modelo-pre-cadastro').validator().on('submit', function (event) {
    //     if (event.isDefaultPrevented()) {
    //         sweetAlert("Erro", "Preencha todos os campos corretamente!", "error");
    //     }else {
    //         var e = false;
    //         obj = $(this);

    //         if (validateEmail($("#email").val()) == false) {
    //             swal({
    //                 title: "Erro",
    //                 text: 'Insira um e-mail válido.',
    //                 type: "error"
    //             });
    //             e = true;
    //         }


    //         var formData = new FormData(obj[0]);

    //         if (e == false) {
    //             $('#form-register').addClass('loading');
    //             valorbt = obj.find('.button-submit').html();
    //             obj.find('.button-submit').html('<div class="loader">Carregando...</div>');
    //             obj.find('.button-submit').prop("disabled",true);

    //             $.ajax({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 },
    //                 type: 'post',
    //                 url: obj.attr( 'action' ),
    //                 dataType: "json",
    //                 data: formData,
    //                 contentType: false,
    //                 cache: false,
    //                 processData:false,
    //                 success: function(valor){

    //                     if (valor.error == false) {

    //                         swal({
    //                             title: "Sucesso",
    //                             html: valor.msg,
    //                             type: "success",
    //                             onClose: function(){
    //                                 window.location.href = obj.attr( 'action' )
    //                             }
    //                         });
    //                     }
    //                     else {

    //                         swal({
    //                             title: "Erro",
    //                             html: valor.msg,
    //                             type: "error"
    //                         });
    //                     }
    //                     $('#form-register').removeClass('loading');
    //                     obj.find('.button-submit').html('');
    //                     obj.find('.button-submit').prop("disabled", false);
    //                     obj.find('.button-submit').html(valorbt);
    //                 },
    //                 error: function(XMLHttpRequest, textStatus, errorThrown){

    //                     swal({
    //                         title: textStatus,
    //                         html: XMLHttpRequest.responseText,
    //                         type: "error"
    //                     });
    //                     $('#form-register').removeClass('loading');
    //                     obj.find('.button-submit').html('');
    //                     obj.find('.button-submit').prop("disabled", false);
    //                     obj.find('.button-submit').html(valorbt);
    //                 }
    //             });
    //         }

    //         event.preventDefault(event);
    //         return false;
    //     }
    // });

	
});