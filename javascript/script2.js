$('.datepicker').datepicker();

$(".arataFiltre").on("click", () => {
    $('.filtre').toggleClass("hidden");
    $('.arataFiltre').toggle();
    $('.ascundeFiltre').toggle();
    
});


$(document).on("change","#materieform", function(){
   var materieselectata = $(this).val();
    
     if(materieselectata){
        $.get("specform.php", {materieselectata: materieselectata}, function(data){
            $("#specializareform").html(data);
            console.log(materieselectata);
        
        });
    }

    if(materieselectata === 0){
        $.get("specformnull.php", {materieselectata: materieselectata}, function(data){
            $("#specializareform").html(data);
            console.log(materieselectata);
        });
        }
        

});

$(document).on("change","#specializareform" ,function(){
    
        var specializareselectata = $("#specializareform").val();
        var anselectat = $("#anform").val();

         if(specializareselectata && anselectat)
        $.get("grupaform.php", {specializareselectata: specializareselectata, anselectat: anselectat}, function(data){
            $("#grupaform").html(data);
            console.log(specializareselectata);
            
        });

        if(specializareselectata === 0){
            $.get("grupaformnull.php", {specializareselectata: specializareselectata, anselectat: anselectat}, function(data){
                $("#grupaform").html(data);
                console.log(specializareselectata);
                
            });
        }
    
});

$(document).on("change","#anform" ,function(){
    
    var specializareselectata = $("#specializareform").val();
    var anselectat = $("#anform").val();

    if(specializareselectata && anselectat)
    $.get("grupaform.php", {specializareselectata: specializareselectata, anselectat: anselectat}, function(data){
        $("#grupaform").html(data);
        console.log(anselectat);
        
    });

});
















// $(document).on("change","#materiepick", function(){
//     var materieselectata = $(this).val();
    
        
    
//      if(materieselectata != ""){
//          $.get("specform.php", {materieselectata: materieselectata}, function(data){
//              $("#specializare").html(data);
//              console.log(materieselectata);
         
//          });
//      }else{
//         $.get("toatespec.php", {materieselectata: materieselectata}, function(data){
//             $("#specializare").html(data);
//             console.log(materieselectata);
        
//         });
//      }
         
//  });
 
//  $(document).on("change","#specializareform" ,function(){
     
//          var specializareselectata = $("#specializareform").val();
//          var anselectat = $("#anform").val();
         
//          if(specializareselectata && anselectat)
//          $.get("grupaform.php", {specializareselectata: specializareselectata, anselectat: anselectat}, function(data){
//              $("#grupaform").html(data);
//              console.log(specializareselectata);
             
//          });
     
//  });
 
//  $(document).on("change","#anform" ,function(){
     
//      var specializareselectata = $("#specializareform").val();
//      var anselectat = $("#anform").val();
 
//      if(specializareselectata && anselectat)
//      $.get("grupaform.php", {specializareselectata: specializareselectata, anselectat: anselectat}, function(data){
//          $("#grupaform").html(data);
//          console.log(anselectat);
         
//      });
 
//  });










$(document).on("click", ".adaugaExamen", () => {
    const valexamen = {
        materieform: $('#materieform').val(),
        specializareform: $('#specializareform').val(),
        anform: $('#anform').val(),
        grupaform: $('#grupaform').val(),
        dataform: $('#dataform').val(),
        oraStart: $('#oraStart').val(),
        minuteStart: $('#minuteStart').val(),
        oraFinal: $('#oraFinal').val(),
        minuteFinal: $('#minuteFinal').val(),
        salaform: $('#salaform').val(),
    }
    
    if((!valexamen.materieform) || (!valexamen.specializareform) || (!valexamen.anform) || (!valexamen.grupaform) || (!valexamen.dataform) ||
     (!valexamen.oraStart) || (!valexamen.minuteStart) || (!valexamen.oraFinal) ||(!valexamen.minuteFinal) || (!valexamen.salaform)){
        alert('Completati toate campurile!')
        return;
    }
    $.post("adauga.php", {valexamen: valexamen}, function(response){
        console.log(response);
        const parsedResponse = jQuery.parseJSON(response);
        if(parsedResponse.status == 200){
            alert("Examen adaugat");
            $(".close").trigger("click");
        } else if(parsedResponse.status == 401) {
            alert("Deja există un examen în acea sală în acel interval orar");
        }else if(parsedResponse.status == 402) {
            alert("Deja ati programat un examen pentru aceasta materie la aceeasi grupa");
        }else if(parsedResponse.status == 400) {
            alert("Examenul nu a fost adăugat");
            console.log();
        }
    });
    

});

$(document).on("click", ".adaugaGrupa",() =>{
    const valgrupa = {
        specializare: $('#specializare').val(),
        an: $('#an').val(),
        grupa: $('#grupamodal').val(),
    }
    if(!valgrupa.grupa){
        alert('Completati numele materiei!');
        return;
    }
    $.post("adaugagrupa.php", {valgrupa:valgrupa},function(response){
        console.log(response);
        const parsedResponse = jQuery.parseJSON(response);
       
        if(parsedResponse.status == 200){
            alert("Grupa a fost adaugata cu succes!");
            $(".closemodal").trigger("click");
            const filtre = {
                specializare: $('#specializare').val(),
                an: $('#an').val(),
            }
            $.get("grupesc.php", {filtre:filtre},function(response){
                    $('.listagrupe').html(response);
            });
        } else if(parsedResponse.status == 400) {
            alert("Grupa nu a fost adaugata!");
            console.log();
        }
    });
    

});


$(document).on("click", ".stergeExamen", function () {
    const examenId = $(this).attr("data-examen");
    console.log(examenId);
    $(".stergeExamenSucces").attr("data-examen",examenId);
});
$(document).on("click", ".stergeExamenSucces", function () {
    const examenId = $(this).attr("data-examen");
$.get("sterge.php", {examenId: examenId}, function(response){
    
    console.log(response);
    const parsedResponse = jQuery.parseJSON(response);
    if(parsedResponse.status == 200){
        const filtre = {
            data: $('.datepicker').val(),
            specializare: $('#specializare').val(),
            an: $('#an').val(),
            grupa: $('#grupa').val(),
            materie: $('#materiepick').val(),
        }
        // get request
        $.get("examenepr.php", { filtre: filtre }, function(response){
            // in div setezi raspunsul primit
            $('.listaExamene').html(response);
          });
        // $(".examenRow[data-examen=" + examenId + "]").remove();
        alert("Examenul a fost șters cu succes");
    } else if(parsedResponse.status == 400) {
        alert("Examenul nu a fost șters");
    }
});
});


$(document).on("click",".stergeGrupa", function(){
    
    const idgrupa =$(this).attr("data-grupa");
    console.log(idgrupa);
    $(".stergeSucces").attr("data-grupa",idgrupa);
});
$(document).on("click",".stergeSucces", function(){
    const idgrupa =$(this).attr("data-grupa");
$.get("stergegrupa.php", {idgrupa:idgrupa}, function(response){
    
    console.log(response);
    const parsedResponse = jQuery.parseJSON(response);
    if(parsedResponse.status == 200){
        const filtre = {
            specializare: $('#specializare').val(),
            an: $('#an').val(),
        }
        $.get("grupesc.php", {filtre:filtre},function(response){
                $('.listagrupe').html("");
                $('.listagrupe').html(response);
        });
        alert("Grupa stearsa cu succes");
        return;

    }else if(parsedResponse.status == 400){
        alert("Grupa nu a fost stearsa");
    }


});

});

$(document).on("click",".modificaGrupa", function(){
    
    const idgrupa =$(this).attr("data-grupa");
    console.log(idgrupa);
    $(".modificaGrupaSucces").attr("data-grupa",idgrupa);
    
});
$(document).on("click",".modificaGrupaSucces", function(){
    const idgrupa =$(this).attr("data-grupa");
const numegrupa = $('#modgrupa').val();

if(!numegrupa){
    alert('Completati numele materiei!');
    return;
}


$.get("modificagrupa.php", {idgrupa:idgrupa, numegrupa:numegrupa}, function(response){
    console.log(response);
    const parsedResponse = jQuery.parseJSON(response);
    if(parsedResponse.status == 200){
        const filtre = {
            specializare: $('#specializare').val(),
            an: $('#an').val(),
        }
        $.get("grupesc.php", {filtre:filtre},function(response){
                $('.listagrupe').html("");
                $('.listagrupe').html(response);
        });
        alert("Numele grupei a fost actualizat");

    }else if(parsedResponse.status == 400){
        alert("Grupa nu a fost modificata");
    }


});

});


$(".arataExameneStudenti").on("click", () => {
    if($('.datepicker').val()){
        // datele pe care le trimitem catre fisier
        const filtre = {
            data: $('.datepicker').val(),
            materie: $('#materiepick').val(),
        }
        // get request
        $.get("examenest.php", { filtre: filtre }, function(response){
            // in div setam raspunsul primit
            $('.listaExamene').html(response);
            $('.listaExamene').removeClass("hidden");
            console.log(filtre['materie']);
          });
    } else if (($(".datepicker").val() == "")  && $("#materiepick").val()){
        const filtre = {
            data: $('.datepicker').val(),
            materie: $('#materiepick').val(),
        }

        $.get("examenematst.php", { filtre: filtre }, function(response){
            // in div setam raspunsul primit
            $('.listaExamene').html(response);
            $('.listaExamene').removeClass("hidden");
            
          });
    } else {
        alert("Data sau materia nu a fost aleasa!");
    }

});


$(".arataExamene").on("click", () => {
    if($('.datepicker').val()){
        // datele pe care le trimitem catre fisier
        const filtre = {
            data: $('.datepicker').val(),
            specializare: $('#specializare').val(),
            an: $('#an').val(),
            grupa: $('#grupa').val(),
            materie: $('#materiepick').val(),
        }
        // get request
        $.get("examenepr.php", { filtre: filtre }, function(response){
            // in div setam raspunsul primit
            $('.listaExamene').html(response);
            $('.listaExamene').removeClass("hidden");
          });
    } else if (($(".datepicker").val() == "")  && $("#materiepick").val()){
        const filtre = {
            data: $('.datepicker').val(),
            specializare: $('#specializare').val(),
            an: $('#an').val(),
            grupa: $('#grupa').val(),
            materie: $('#materiepick').val(),
        }

        $.get("examenematpr.php", { filtre: filtre }, function(response){
            // in div setam raspunsul primit
            $('.listaExamene').html(response);
            $('.listaExamene').removeClass("hidden");
          });
    } else {
        alert("Data sau materia nu a fost aleasa!");
    }
});

$(".arataExameneSecretar").on("click", () => {
    if($('.datepicker').val()){
        // datele pe care le trimitem catre fisier
        const filtre = {
            data: $('.datepicker').val(),
            specializare: $('#specializare').val(),
            an: $('#an').val(),
            grupa: $('#grupa').val(),
            materie: $('#materiepick').val(),
        }
        // get request
        $.get("examenesc.php", { filtre: filtre }, function(response){
            // in div setam raspunsul primit
            $('.listaExamene').html(response);
            $('.listaExamene').removeClass("hidden");
          });
    } else if (($(".datepicker").val() == "")  && $("#materiepick").val()){
        const filtre = {
            data: $('.datepicker').val(),
            specializare: $('#specializare').val(),
            an: $('#an').val(),
            grupa: $('#grupa').val(),
            materie: $('#materiepick').val(),
        }

        $.get("examenematsc.php", { filtre: filtre }, function(response){
            // in div setam raspunsul primit
            $('.listaExamene').html(response);
            $('.listaExamene').removeClass("hidden");
          });
    } else {
        alert("Data sau materia nu a fost aleasa!");
    }
    });

    $(".arataGrupe").on("click", () => {
        if(($('#specializare').val()) && ($('#an').val())){
           
            const filtre = {
                specializare: $('#specializare').val(),
                an: $('#an').val(),
            }
          
            $.get("grupesc.php", { filtre: filtre }, function(response){
               
                $('.listagrupe').html(response);
                $('.listagrupe').removeClass("hidden");
                console.log(filtre['specializare']);
                console.log(filtre['an']);

              });
        } 
       else {
            alert("Completati toate campurile!");
        }
    });
    