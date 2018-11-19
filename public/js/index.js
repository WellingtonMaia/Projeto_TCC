(function($) {
    "use strict";
    $('.input100').each(function() {
        $(this).on('blur', function() {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val')
            } else {
                $(this).removeClass('has-val')
            }
        })
    })
    var input = $('.validate-input .input100');
    $('.validate-form').on('submit', function() {
        var check = !0;
        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == !1) {
                showValidate(input[i]);
                check = !1
            }
        }
        return check
    });
    $('.validate-form .input100').each(function() {
        $(this).focus(function() {
            hideValidate(this)
        })
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return !1
            }
        } else {
            if ($(input).val().trim() == '') {
                return !1
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).addClass('alert-validate')
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).removeClass('alert-validate')
    }
    var showPass = 0;
    $('.btn-show-pass').on('click', function() {
        if (showPass == 0) {
            $(this).next('input').attr('type', 'text');
            $(this).find('i').removeClass('zmdi-eye');
            $(this).find('i').addClass('zmdi-eye-off');
            showPass = 1
        } else {
            $(this).next('input').attr('type', 'password');
            $(this).find('i').addClass('zmdi-eye');
            $(this).find('i').removeClass('zmdi-eye-off');
            showPass = 0
        }
    })
})(jQuery)

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

    // if($(".task-completed").is(':checked')){
    //     $(".task-completed").parent().parent().addClass("completed");
    // } else{
    //     $(".task-completed").parent().parent().removeClass("completed");
    // }

    // if($(".task-completed").not(':checked')){
    //     $(this).parent().parent().removeClass("completed");        
    //     console.log($(this).parent().parent().removeClass("completed") );
    //     console.log($(".task-completed"));
    // } 

    $(".task-completed").on("change", function (){
        
        currentTask = $(this).parent().parent();

        currentTask.toggleClass("completed");

        var status = $(this).attr("data-status");
        var id = $(this).attr("data-id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/tasks/updateStatus',
            type: "POST",
            data: {id: id, status: status},
            dataType:'JSON',
            success:function(response){
                if(response.error == false){
                    console.log(response.status);
                    $(".task-completed").attr("data-status",response.status);
                    currentTask.attr("data-status",response.status);
                }else{
                    console.log("erro");
                }
            }

        });
            
        // }else{
        //     $(this).parent().parent().removeClass("completed");
        //     console.log("volta");
        // }
    });

    // ajax

    $("#addNote").submit(function(){
        // event.preventDefault();

        var task_id = $("#note_task_id").val();
        var users_id = $("#note_users_id").val();
        var description = $("#note_description").val();

        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
            },
            url:'/tasks/addNote/',
            type:"POST",
            data:{description: description, task_id:task_id, users_id:users_id},
            dataType:"JSON",
            success:function(response){
                if(response.error == false){
                        $(".btn-info.note").parent().parent().next().removeClass("active");
                        $(".shadow").removeClass("active");
                        $('.alert-hidden').addClass('active');
                        setTimeout(function(){
                            $('.alert-hidden').addClass('active');
                        },2000);
                    location.reload();
                }else{
                    console.log("errou");
                }
            }


        });
        return false;
    });

    $("#addFile").submit(function(){
        // event.preventDefault();

        var task_id = $("#task_id").val();
        var users_id = $("#users_id").val();
        var file_url = $("#file_url").val();

        var form = document.getElementById("addFile");
        var formData = new FormData(form);   

        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
            },
            url:'/tasks/addFile/',
            type:"POST",
            processData:false,
            contentType: false,
            data:formData,
            // data:{file_url: file_url, task_id:task_id, users_id:users_id},
            dataType:"JSON",
            success:function(response){
                if(response.error == false){
                        $(".btn-info.file").parent().parent().next().removeClass("active");
                        $(".shadow").removeClass("active");
                        $('.alert-hidden').addClass('active');
                        setTimeout(function(){
                            $('.alert-hidden').addClass('active');
                        },2000);
                    // location.reload();
                }else{
                    console.log("errou");
                }
            }


        });
        return false;
    });

    $("#addTime").submit(function(){
        // event.preventDefault();

        var task_id = $("#time_task_id").val();
        var users_id = $("#time_users_id").val();
        var date = $("#time_begin_date").val();
        var time_start = $("#time_start").val();
        var time_stop = $("#time_stop").val();        
        var time_value = $("#time_value").val();

        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
            },
            url:'/tasks/addTime/',
            type:"POST",
            data:{date: date, task_id:task_id, users_id:users_id,time_start:time_start,time_stop:time_stop,time_value:time_value},
            dataType:"JSON",
            success:function(response){
                if(response.error == false){
                        $(".btn-info.time").parent().parent().next().removeClass("active");
                        $(".shadow").removeClass("active");
                        $('.alert-hidden').addClass('active');
                        setTimeout(function(){
                            $('.alert-hidden').removeClass('active');
                        },2000);
                    // location.reload();
                }else{
                    console.log("errou");
                }
            }


        });
        return false;
    });


    $(".btn-info.time, .btn-info.file, .btn-info.note").click(function (e){
        e.preventDefault(); 
        $(this).parent().parent().next().addClass("active");
        $(".shadow").addClass("active");
    });


    // $(".task .popup:before").click(function (){
    //     $(this).parent().parent().find("popup").removeClass("active");
    // });
    // $(".btn-info.file").click(function (){
    //     $(this).next().addClass("active");
    // });
    // $(".btn-info.note").click(function (){
    //     $(this).next().addClass("active");
    // });


    $("#open-fancy").click(function (e){
        e.preventDefault(); 
        $(".task-box").addClass("active");
        $(".shadow").addClass("active");
    }); 


    $(".shadow").click(function (){
        $(this).removeClass("active");
        $(".task-box").removeClass("active");
        $(".btn-info.time").parent().parent().next().removeClass("active");
        $(".btn-info.file").parent().parent().next().removeClass("active");
        $(".btn-info.note").parent().parent().next().removeClass("active");
    });


    var timer = new Timer();

    //  if(timer.isRunning() == true){
    //     console.log(timer.isRunning());
    //     console.log("ausehsaehugr");
    //     $(".main-timer").addClass("active");
    // }

    $(".start-time").click(function (e){

        localStorage.setItem('isrunning','true');

        var date = new Date();
        var minutes = date.getMinutes();
        var hours = date.getHours();
        var currentTime = hours+":"+minutes;

        localStorage.setItem('started-time',currentTime);

        console.log(localStorage.getItem('started-time'));

        console.log(timer.getTimeValues(10,20,8));
        console.log(timer.getTimeValues(10,20,8));


      $(".main-timer").addClass("active");

        e.preventDefault();
        timer.start();
        timer.addEventListener('secondsUpdated', function (e) {
            $('#tempoRegistrado').html(timer.getTimeValues().toString());
        });
         
    });

    $(".stop-timer").click(function(e){
        e.preventDefault();
        timer.stop();


        var date = new Date();
        var minutes = date.getMinutes();
        var hours = date.getHours();
        var currentTime = hours+":"+minutes;

        localStorage.setItem('stop-time',currentTime);
        localStorage.setItem('time',timer.getTimeValues().toString());
        console.log(timer.getTimeValues());
    }); 

    timer.addEventListener('started', function (e) {
        $('#tempoRegistrado').html(timer.getTimeValues().toString());
    });

    $(".pause-timer").click(function (e){
      e.preventDefault();
      timer.pause();


        var date = new Date();
        var minutes = date.getMinutes();
        var hours = date.getHours();
        var currentTime = hours+":"+minutes;

        localStorage.setItem('stop-time',currentTime);

        localStorage.setItem('time',timer.getTimeValues().toString());

        console.log(timer.getTimeValues());
        console.log(timer.getTimeValues().toString());

        timer.addEventListener('started', function (e) {
            $('#tempoRegistrado').html(timer.getTimeValues().toString());
        });
       

        console.log(timer.getTimeValues());

    });  


    $(".celular").mask('(00) 00000-0000');
    $('.datepicker').datepicker();
 	$('.timepicker').mask('00:00');


    $("#project").change(function (){

    var data = $(this).val();

    $.ajax({
        url: '/tasks/getUsers',
        type: "GET",
        data: {id : data},
        dataType:'JSON',
        success:function(response){
            if(response.error == false){
                $("#usersProject").html(response.html);
            }else{
                console.log("erro");
            }           
        }
      });
    });

    const id = $('#id').val();

     // Initialize a Line chart in the container with the ID chart1
      new Chartist.Line('#chart1', {
        labels: [id, 2, 3, 4],
        series: [[100, 120, 180, 200]]
      });

      // Initialize a Line chart in the container with the ID chart2
      new Chartist.Bar('#chart2', {
        labels: [1, 2, 3, 4],
        series: [[5, 2, 8, 3]]
      });
});


$(document).ready(function (){


    // if(localStorage.getItem('isrunning') == 'true' ){
    //     $(".main-timer").addClass("active");

    //     var oldtimer = new Timer();

    //     oldtimer.start();


    //     oldtimer.addEventListener('secondsUpdated', function (e) {
    //         $('#tempoRegistrado').html(oldtimer.getTimeValues().toString());
    //     });

    //     oldtimer.addEventListener('started', function (e) {
    //         $('#tempoRegistrado').html(localStorage.getItem('time'));
    //     });
    // }


});



      // var pagina = $('#open-fancy').attr("href");
      // console.log(pagina);

      //  $('#open-fancy').click(function (){
      //       $.fancybox.open({
      //           src  : pagina,
      //           type : 'iframe',
      //       });
      //  });




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
	
