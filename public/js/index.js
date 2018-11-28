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
})(jQuery);

$( document ).ready(function() {    	

	// function getRandomInt(min, max) {
	//   min = Math.ceil(min);
	//   max = Math.floor(max);
	//   return Math.floor(Math.random() * (max - min)) + min; //The maximum is exclusive and the minimum is inclusive
	// }

	// var n = getRandomInt(1,4);
	// $(".aside::before").css("background","url('../img/sidebar-"+n+".jpg')");


	// $(".header .left .menu").click(function (){
	// 	$(this).toggleClass('active');
	// 	$(".aside").toggleClass('active');
	// });

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



    // ajax
    $(".list-tasks").on('change','.task-completed', function (){

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
    });


    $(".status-tarefa").on("change", "#statusInterna", function (){

        item = $(this);

        status = item.attr("data-status");
        id = item.attr("data-id");

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
                    item.attr("data-status",response.status);
                       
                    if(response.status == 'C'){
                        $('.desc-status').text("Status da tarefa : Concluida");
                    }else{
                        $('.desc-status').text("Status da tarefa : Iniciada/Em Desenvolvimento");
                    }


                }else{
                    console.log("erro");
                }
            }

        });
    });


    $(".task-content").on("submit", "#addTask", function (){
    // $("#addTask").submit(function (){
            var scope = $(this);
            var data = scope.serialize();
            // var project_id = $("#project_id").val();
            $.ajax({

                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
                },
                url:'/tasks/addTask/',
                type:"POST",
                data:data,
                dataType:"JSON",
                success:function(response){
                    if(response.error == false){                            
                            $(".task-box , .shadow").removeClass("active");
                            $('.alert-hidden div').text('Tarefa cadastrada com sucesso');
                            $('.alert-hidden').addClass('active');
                            $(".list-tasks").append(response.html);                            
                            scope.find('input').val("");
                            scope.find('textarea').val("");                           
                            setTimeout(function(){
                                $('.alert-hidden').removeClass('active');
                            },2000);                        
                    }else{
                        console.log("errou");
                    }
                }
            });
            return false;
        }); 
    // });


    $(".task-content").on("submit", "#editTask", function (){
        var scope = $(this);
        var data = scope.serialize();

        $.ajax({

                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
                },
                url:'/tasks/updateTask/',
                type:"POST",
                data:data,
                dataType:"JSON",
                success:function(response){
                    if(response.error == false){

                            $(".task-box , .shadow").removeClass("active");
                            $('.alert-hidden div').text('Tarefa editada com sucesso');
                            $('.alert-hidden').addClass('active');

                            scope.find('input').val("");
                            scope.find('textarea').val("");                          

                            console.log(response.users);
                            console.log(response.task.id);

                            var element = $('a[data-id="'+response.task.id+'"]').parent().parent();

                            element.find(".dates.begin").text("(Inicio: "+moment(response.task.begin_date).format('DD/MM/YYYY'));
                            element.find(".dates.final").text("Vence: "+moment(response.task.final_date).format('DD/MM/YYYY')+")");
                            element.find(".title-task").text(response.task.name);
                            element.find("hidden").text(response.task.description);


                            // element.find("#name_task").val(response.task.name);
                            // element.find("#description").val(response.task.description);
                            // element.find("#estimate_date").val(moment(response.task.estimate_date).format('DD/MM/YYYY'));
                            // element.find("#estimate_time").val(removeSeconds(response.task.estimate_time));
                            // $("#begin_date").val(moment(response.task.begin_date).format('DD/MM/YYYY'));
                            // $("#final_date").val(moment(response.task.final_date).format('DD/MM/YYYY'));
                            // element.

                            setTimeout(function(){
                                $('.alert-hidden').removeClass('active');
                            },2000);                        
                    }else{
                        console.log("errou");
                    }
                }
            });
            return false;
        }); 
    // });


    $(".conteudo").on("submit", "#addTime", function (){
    // $("#addTime").submit(function(){
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
                        $(".no-registers-time").css('display','none');
                        $(".btn-info.time").parent().parent().next().removeClass("active");
                        $(".shadow").removeClass("active");
                        $('.alert-hidden div').text('Tempo cadastrado com sucesso');
                        $('.alert-hidden').addClass('active');
                        $(".time-registers").append(response.html);
                        $("#tempoRegistrado").text("00:00:00");
                        $("#addTime input[type='text']").val("");
                        localStorage.clear();
                        setTimeout(function(){
                            $('.alert-hidden').removeClass('active');
                        },2000);
                }else{
                    console.log("errou");
                }
            }
        });
        return false;
    });


    $(".conteudo").on("submit", "#addFile", function (){
    // $("#addFile").submit(function(){

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
            dataType:"JSON",
            success:function(response){
                if(response.error == false){
                        $(".no-registers-file").css('display','none');
                        $(".btn-info.file").parent().parent().next().removeClass("active");
                        $(".shadow").removeClass("active");
                        $('.alert-hidden div').text('Arquivo cadastrado com sucesso');
                        $('.alert-hidden').addClass('active');
                        $(".file-registers").append(response.html);
                        $("#addFile input[type='text'], #addFile input[type='file']").val("");
                        setTimeout(function(){
                            $('.alert-hidden').removeClass('active');
                        },2000);
                }else{
                    console.log("errou");
                }
            }
        });
        return false;
    });


    $(".conteudo").on("submit", "#addNote", function (){
    // $("#addNote").submit(function(){       

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
                        $(".no-registers-note").css('display','none');
                        $(".btn-info.note").parent().parent().next().removeClass("active");
                        $(".shadow").removeClass("active");
                        $('.alert-hidden div').text('Anotação cadastrada com sucesso');
                        $('.alert-hidden').addClass('active');
                        $(".note-registers").append(response.html);
                        $("#addNote textarea").val("");
                        setTimeout(function(){
                            $('.alert-hidden').removeClass('active');
                        },2000);
                }else{
                    console.log("errou");
                }
            }
        });
        return false;
    });


    $(".conteudo").on("submit", "#editTime", function (){
    // $("#addTime").submit(function(){

        var time_id = $("#time_id").val();
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
            url:'/tasks/updateTime/',
            type:"POST",
            data:{date: date, task_id:task_id, users_id:users_id,time_start:time_start,time_stop:time_stop,time_value:time_value,time_id:time_id},
            dataType:"JSON",
            success:function(response){
                if(response.error == false){

                        $(".btn-info.time").parent().parent().next().removeClass("active");
                        $(".shadow").removeClass("active");

                        $('.alert-hidden div').text('Tempo cadastrado com sucesso');
                        $('.alert-hidden').addClass('active');

                        $(".time-registers").append(response.html);

                        // $("#tempoRegistrado").text("00:00:00");
                        $("#editTime").attr('id', "addTime");
                        $("#addTime input[type='text']").val("");

                        var element = $('a[data-id="'+time_id+'"]').parent().parent();

                        var newDate = moment(response.time.date).format('DD/MM/YYYY');

                        element.find(".date-time").text(newDate);
                        element.find(".start").text(response.time.time_start);  
                        element.find(".stop").text(response.time.time_stop);
                        element.find(".value").text(response.time.time_value);

                        // localStorage.clear();
                        setTimeout(function(){
                            $('.alert-hidden').removeClass('active');
                        },2000);
                }else{
                    console.log("errou");
                }
            }
        });
        return false;
    });

    $(".conteudo").on("submit", "#editNote", function (){

    // $("#editNote").submit(function(){       

        var note_id = $("#note_id").val();
        var task_id = $("#note_task_id").val();
        var users_id = $("#note_users_id").val();
        var description = $("#note_description").val();

        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
            },
            url:'/tasks/updateNote/',
            type:"POST",
            data:{description: description, task_id:task_id, users_id:users_id, note_id:note_id},
            dataType:"JSON",
            success:function(response){
                if(response.error == false){
                        
                        $(".btn-info.note").parent().parent().next().removeClass("active");
                        $(".shadow").removeClass("active");

                        $('.alert-hidden div').text('Anotação editada com sucesso');
                        $('.alert-hidden').addClass('active');
                        
                        $("#editNote textarea").val("");
                        $("#editNote").attr('id', "addNote");

                        $('a[data-id="'+note_id+'"]').parent().parent().find(".note-desc").text(response.note.description);

                        setTimeout(function(){
                            $('.alert-hidden').removeClass('active');
                        },2000);
                }else{
                    console.log("errou");
                }
            }
        });
        return false;
    });






    // delete ajax
    $(".list-tasks").on('click', '.removeTask', function (e){
        e.preventDefault();

        var item = $(this).parent().parent();
        var id = $(this).attr("data-id");

        console.log(item);
        console.log(id);
        
        swal({
            title:"Tem certeza que deseja remover essa tarefa ?",
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Sim',
            // confirmButtonColor: '#0b5196',
            cancelButtonText: 'Não',
            cancelButtonColor: '#d33',

        }).then(function (e){            
            if(e.value == true){
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
                    },
                    url:'/tasks/removeTask',
                    dataType:'JSON',
                    data:{id:id},
                    type:"POST",
                    success:function(response){
                        if(response.error == false){
                            item.remove();
                            $('.alert-hidden').addClass('active');
                            $('.alert-hidden div').text('Tarefa removido com sucesso');
                            setTimeout(function(){
                                    $('.alert-hidden').removeClass('active');
                                },2000);
                        }else{
                            console.log("erro");
                        }
                    }
                });
            }
        });
    });

    $(".list-tasks").on('click', '.editTask', function (e){
        e.preventDefault();
        $("#open-fancy").click();
        var item = $(this).parent().parent();
        var id = $(this).attr("data-id");

        $("#task_id").val(id);
        $("#addTask").attr('id', 'editTask');

        $.ajax({
            url: '/tasks/editTask',
            type: "GET",
            data: {id : id},
            dataType:'JSON',
            success:function(response){
                if(response.error == false){  
                    // console.log(response.users[0].id);  
                    // console.log(response.users[1].id);
                    console.log(response.users);


                    // $("#usersProject option").each( function (i, e){
                    //     if($(this).attr('value' == response.users[e].id)){
                    //         this.attr('selected','selected');
                    //         // $(this).parent().selectedIndex = e;
                    //     }
                    // });

                        // só faz essa alteração se n vai ter BO no safari
                        // $(this).parent().selectedIndex = e;
                        // n lugar de this.attr('selected','selected');
                        // var i = 0;
                        // $("#usersProject option").each( function (e){
                        //     if(this.value == response.users[i].id){
                        //         this.attr('selected','selected');

                        // if($(this).attr('value') == response.users[i].id){
                        //       this.attr('selected','selected');
                        //   }
                        // }
                        // // }
                        // console.log($(this).attr('value'));
                        // if($(this).attr('value') == ){
                        //      $(this).attr('selected','selected');
                        //      console.log(response.users[i].id);
                        //     }
                            
                        // }
                        // console.log(i);
                        // i++;
                    // });

                    $("#name_task").val(response.task.name);
                    $("#description").val(response.task.description);
                    $("#estimate_date").val(moment(response.task.estimate_date).format('DD/MM/YYYY'));
                    $("#estimate_time").val(removeSeconds(response.task.estimate_time));
                    $("#begin_date").val(moment(response.task.begin_date).format('DD/MM/YYYY'));
                    $("#final_date").val(moment(response.task.final_date).format('DD/MM/YYYY'));
                    
                }else{
                    console.log("erro");
                }
            }
        });


    });

    $(".time-registers").on('click','.removeTime', function(e){
        e.preventDefault();

        var item = $(this).parent().parent();
        var id = $(this).attr("data-id");

        swal({
            title:"Tem certeza que deseja remover esse tempo ?",
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Sim',
            // confirmButtonColor: '#0b5196',
            cancelButtonText: 'Não',
            cancelButtonColor: '#d33',

        }).then(function (e){            
            if(e.value == true){
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
                    },
                    url:'/tasks/removeTime',
                    dataType:'JSON',
                    data:{id:id},
                    type:"POST",
                    success:function(response){
                        if(response.error == false){
                            item.remove();
                            resetItemTask("time");
                            $('.alert-hidden').addClass('active');
                            $('.alert-hidden div').text('Tempo removido com sucesso');
                            setTimeout(function(){
                                    $('.alert-hidden').removeClass('active');
                                },2000);
                        }else{
                            console.log("erro");
                        }
                    }
                });
            }
        });
    });

    $(".note-registers").on('click','.removeNote', function(e){
        e.preventDefault();

        var item = $(this).parent().parent();
        var id = $(this).attr("data-id");

        swal({
            title:"Tem certeza que deseja remover essa anotação ?",
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Sim',
            // confirmButtonColor: '#0b5196',
            cancelButtonText: 'Não',
            cancelButtonColor: '#d33',
        }).then(function (e){
            if(e.value == true){        
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
                    },
                    url:'/tasks/removeNote',
                    dataType:'JSON',
                    data:{id:id},
                    type:"POST",
                    success:function(response){
                        if(response.error == false){
                            item.remove();
                            resetItemTask("note");
                            $('.alert-hidden').addClass('active');
                            $('.alert-hidden div').text('Anotação removida com sucesso');
                            setTimeout(function(){
                                    $('.alert-hidden').removeClass('active');
                                },2000);
                        }else{
                            console.log("erro");
                        }
                    }
                });

            }
        });
    });

    
    // $(".note-registers").on('click','.editNote', function(e){
    //     e.preventDefault();

    //     var item = $(this).parent();
    //     var id = $(this).attr("data-id");

    // });

    $(".file-registers").on('click', '.removeFile', function (e){
        e.preventDefault();
        var item = $(this).parent().parent();
        var id = $(this).attr("data-id");

        swal({
            title:"Tem certeza que deseja remover esse arquivo ?",
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Sim',
            // confirmButtonColor: '#0b5196',
            cancelButtonText: 'Não',
            cancelButtonColor: '#d33',

        }).then(function(e){
            if(e.value == true){        
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
                    },
                    url:'/tasks/removeFile',
                    dataType:'JSON',
                    data:{id:id},
                    type:"POST",
                    success:function(response){
                        if(response.error == false){
                            item.remove();
                            resetItemTask("file");
                            $('.alert-hidden').addClass('active');
                            $('.alert-hidden div').text('Arquivo removido com sucesso');
                            setTimeout(function(){
                                    $('.alert-hidden').removeClass('active');
                                },2000);
                        }else{
                            console.log("erro");
                        }
                    }
                });
            }
        });
    });



    // edit

    $(".time-registers").on('click','.editTime', function(e){
        e.preventDefault();
        $(".btn-info.time").click();
        $("#addTime").attr('id','editTime');

        var item = $(this).parent().parent();
        var id = $(this).attr("data-id");
        $("#time_id").val(id);

        $.ajax({
            url: '/tasks/editTime',
            type: "GET",
            data: {id : id},
            dataType:'JSON',
            success:function(response){
                if(response.error == false){    
                    var newDate = moment(response.time.date).format('DD/MM/YYYY');
                    var timeStart = removeSeconds(response.time.time_start);
                    var timeEnd = removeSeconds(response.time.time_stop);
                    var timeValue = removeSeconds(response.time.time_value);

                    $("#time_begin_date").val(newDate);
                    $("#time_start").val(timeStart);
                    $("#time_stop").val(timeEnd);
                    $("#time_value").val(timeValue);
                }else{
                    console.log("erro");
                }
            }
        });
    });

    $(".note-registers").on('click','.editNote', function (e){
        e.preventDefault();
        $(".btn-info.note").click();
        $("#addNote").attr('id', "editNote");
        
        var id = $(this).attr("data-id");
        $("#note_id").val(id);

        $.ajax({
            url: '/tasks/editNote',
            type: "GET",
            data: {id : id},
            dataType:'JSON',
            success:function(response){
                if(response.error == false){
                    $("#note_description").val(response.note.description);                
                }else{
                    console.log("erro");
                }
            }
        });
    });





    $("#open-fancy").click(function (e){
        e.preventDefault();        
        $(".task-box").addClass("active");
        $(".shadow").addClass("active");
    });

    $(".btn-info.time, .btn-info.file, .btn-info.note").click(function (e){
        e.preventDefault(); 
        $(this).parent().parent().next().addClass("active");
        $(".shadow").addClass("active");

    });

    $(".shadow").click(function (){
        $(this).removeClass("active");
        $(".task-box").removeClass("active");
        $(".btn-info.time").parent().parent().next().removeClass("active");
        $(".btn-info.file").parent().parent().next().removeClass("active");
        $(".btn-info.note").parent().parent().next().removeClass("active");
    });

    $("#time_value").focus(function (){

        if( $("#time_start").val() != "" && $("#time_stop").val() != ""){
            
            var final = getTimeInterval($("#time_start").val(),$("#time_stop").val());
            
            $("#time_value").val(final);

        }
    });


    var timer = new Timer();

    $(".resume").click(function (e){
        e.preventDefault();
        $(this).removeClass("active");
        $(this).siblings().removeClass("active");
    });

    $(".start-time").click(function (e){
        e.preventDefault();
        localStorage.setItem('isrunning','true');

        var date = new Date();
        var currentTime = date.getHours()+":"+date.getMinutes();

        localStorage.setItem('started-time',currentTime);

        $(".main-timer").addClass("active");

        timer.start();
        timer.addEventListener('secondsUpdated', function (e) {
            $('#tempoRegistrado').html(timer.getTimeValues().toString());
        });
         
    });

    $(".register-timer").click(function(e){
        e.preventDefault();
        timer.stop();

        var date = new Date();
        var currentTime = date.getHours()+":"+date.getMinutes();
        var currentDate = date.getUTCDate()+'/'+date.getUTCMonth()+'/'+date.getUTCFullYear();
        var dateUTC     = date.getUTCFullYear()+'-'+date.getUTCMonth()+'-'+date.getUTCDate();

        localStorage.setItem('stoped-time',currentTime);
        localStorage.setItem('time',timer.getTimeValues().toString());

        var time_start = localStorage.getItem('started-time');
        var time_stop  = localStorage.getItem('stoped-time');
        // var time_value = localStorage.getItem('time');
        var time_value = $("#tempoRegistrado").text();

        var time = new Date(dateUTC+"T"+time_value);

        if (time.getMinutes() == 0) {
            time_value = '00:01';
            // time_value.text("00:01");    
        }else{
            var time_value = removeSeconds(time_value);
        }
        // str.split(" ");
        
        console.log(time_value);

        // console.log(dateUTC+"T"+time_value);
        // console.log(time);
        // console.log(time.getMinutes());

        $(".main-timer").removeClass("active");

        $("#time_begin_date").val(currentDate);
        $("#time_start").val(removeSeconds(time_start));
        $("#time_stop").val(removeSeconds(time_stop));        
        $("#time_value").val(removeSeconds(time_value));

        $(".btn-info.time").click();

    }); 

    timer.addEventListener('started', function (e) {
        $('#tempoRegistrado').html(timer.getTimeValues().toString());
    });

    $(".pause-timer").click(function (e){
      e.preventDefault();
      timer.pause();

        $(this).addClass("active");
        $(this).siblings().addClass("active");

        var date = new Date();
        var minutes = date.getMinutes();
        var hours = date.getHours();
        var currentTime = hours+":"+minutes;

        localStorage.setItem('stop-time',currentTime);

        localStorage.setItem('time',timer.getTimeValues().toString());

        timer.addEventListener('started', function (e) {
            $('#tempoRegistrado').html(timer.getTimeValues().toString());
        });       
    });  


    $(".celular").mask('(00) 00000-0000');

    $(".money").mask('R$ 000.000.000.000.000,00', {reverse: true});


    jQuery('.datepicker').datepicker({ 
        format: 'dd/mm/yyyy',
        language:'pt-Br',
        autoclose:true,
        todayBtn:'linked',
        todayHighlight:true
    });

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

    // const id = $('#id').val();

     // Initialize a Line chart in the container with the ID chart1
//       new Chartist.Line('#chart1', {
//         labels: [id, 2, 3, 4],
//         series: [[100, 120, 180, 200]]
//       });

//       // Initialize a Line chart in the container with the ID chart2
//       new Chartist.Bar('#chart2', {
//         labels: [1, 2, 3, 4],
//         series: [[5, 2, 8, 3]]
//       });
});

function getTimeInterval(startTime, endTime){
    var start = moment(startTime, "HH:mm");
    var end = moment(endTime, "HH:mm");
    var minutes = end.diff(start, 'minutes');
    var interval = moment().hour(0).minute(minutes);
    // interval.subtract(lunchTime, 'minutes');
    return interval.format("HH:mm");
}

function removeSeconds(param){

    var time = param.split(":");
    // var newTime = time[0]+":"time[1];
    var newTime = moment().hour(time[0]).minute(time[1]);

    return newTime.format("HH:mm");

}

function resetItemTask(current){
    if($("."+current+"-registers").children().length == 0 ){
        $(".no-registers-"+current).css('display','block');    
    }
}


// $(document).ready(function (){


    //  if(timer.isRunning() == true){
    //     console.log(timer.isRunning());
    //     console.log("ausehsaehugr");
    //     $(".main-timer").addClass("active");
    // }

    // if(localStorage.getItem('isrunning') == 'true' ){


    //     $(".main-timer").addClass("active");

    //     var oldtimer = new Timer();

    //     oldtimer.start();

    //     var time_value = localStorage.getItem('time');

    //     $("#tempoRegistrado").text(time_value);

    //     console.log($("#tempoRegistrado").text(time_value));



    //     oldtimer.addEventListener('secondsUpdated', function (e) {
    //         $('#tempoRegistrado').html(oldtimer.getTimeValues().toString());
    //     });

    //     oldtimer.addEventListener('started', function (e) {
    //         $('#tempoRegistrado').html(oldtimer.getTimeValues().toString());
    //     });
    // }


// });



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
	
