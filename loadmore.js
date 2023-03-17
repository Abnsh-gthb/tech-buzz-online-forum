
    $(document).ready(function(){
        $('.load-more').click(function(){
        // row=0;
        var row = Number($('#row').val());
        // alert(row);
        var allcount = Number($('#all').val());
        row = row + 3; 
        if(row <= allcount){
            $("#row").val(row);
            $.ajax({
                url: 'getData.php',
                type: 'post',
                data: {row:row},
                beforeSend:function(){
                    $(".load-more").text("Loading...");
                },
                success: function(response){
                    setTimeout(function() {
                        $(".post:last").after(response).show().fadeIn("slow");
                        var rowno = row + 5;
                        
                        if(rowno > allcount){
                            $('.load-more').text("Hide");
                            $('.load-more').css("background","darkorchid");
                        }else{
                            $(".load-more").text("Load more");
                        }
                    },);
                }
            });
        }else{
            $('.load-more').text("Loading...");
            setTimeout(function() {
                $('.post:nth-child(3)').nextAll('.post').remove().fadeIn("slow");
                $("#row").val(-2);
                $('.load-more').text("Load more");
                $('.load-more').css("background","#15a9ce");
            }, );
        }
    });
});
