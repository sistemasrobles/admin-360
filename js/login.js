



$("#form_login").submit(function(event) {

    event.preventDefault();

   
    const formData = new FormData(document.getElementById("form_login"));



        $.ajax({
            
            url: 'management/CompruebaLogin.php',
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            beforeSend: function() {

               

            },
            success: function(response) {


                if (response.status == "ok") {

                   $("#errors").text('');

                   window.location.href = "index";


                } else {

                     $("#errors").text(response.description);
                   
                }
                
            },
            error: function(jqXHR, textStatus, errorThrown) {

                ajaxError(jqXHR, textStatus, errorThrown);
               

            }

        });


});