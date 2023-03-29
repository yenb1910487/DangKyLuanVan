$(document).ready(function(){
    $("#luumatkhau").on('click',function(e){
        e.preventDefault();
        var matkhaucu = $("#matkhaucu").val();
        var matkhaumoi = $("#matkhaumoi").val();
        var nhaplaimkmoi = $("#nhaplaimkmoi").val();
        if(matkhaucu == '' || matkhaumoi =='' || nhaplaimkmoi ==''){
            swal({
                title: "Error",
                text: "Bạn phải nhập đầy đủ tất cả các trường",
                icon: "error"
            })
        }else{
            $.ajax({
                url: "./ajax/doimatkhau.php",
                type: "POST",
                data:{matkhaucu:matkhaucu,matkhaumoi:matkhaumoi,nhaplaimkmoi:nhaplaimkmoi},
                success:function(data){
                    $("#mes_submitpw").html(data);
                    setTimeout(function(){
                        $("#mes_submitpw").fadeOut("slow");
                        $("#matkhaucu").val("");
                        $("#matkhaumoi").val("");
                        $("#nhaplaimkmoi").val("");
                    },3000)
                },
                error:function(data){
                    $("#mes_submitpw").html(data);
                }
            })
        }
        
    })


})