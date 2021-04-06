/*Get Area by Location*/
  $(document).on('change','#location', function(){

        var id  = $(this).val();
        var url = $(this).find('option:selected').attr('data-url');
        var type = $(this).find('option:selected').attr('data-type');
        if (type == 'city') {
         $('#location_type').val('city');   
        }
        if (type == 'division') {
         $('#location_type').val('division');   
        }
        if ('' != id) {
            var pageurl = url;
            $.ajax({
                type:'get',
                url:pageurl,
                async :true,
                beforeSend: function () {
                    $("body").css("cursor", "progress");
                },
                success: function (data) {
                    console.log(data);
                    $('#area').html(data);
                },
                complete: function (data) {
                    $("body").css("cursor", "default");
                }
            });
        }


    });