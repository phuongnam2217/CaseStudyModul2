
$(document).ready(function () {
    // Trang chủ
        $('#search').click(function(){
            $('#formsearch').toggle();
        })
    // Trang chi tiết sản phẩm
    $image1 = $("#image1").attr("src");
    $image2 = $("#image2").attr("src");    
        $("#image2").click(function(){
            $("#image").attr('src',$image2);
            $("#image2").css("border","1px solid black");
            $("#image1").css("border","none");
        })
        $("#image1").click(function(){
            $("#image").attr('src',$image1);
            $("#image1").css("border","1px solid black");
            $("#image2").css("border","none");
        })
        // $('.pagination-btn').click(function(){
        //     $('.pagination-btn').toggle('active')
        // })
        $('#giam').click(function(){
            var qty = $("#qty").val();
            qty--;
            if(qty <= 0){
                qty = 1;
            }
            $("#qty").val(qty);
        })
        $('#tang').click(function(){
            var qty = $("#qty").val();
            qty++;
            // if(qty <= 0){
            //     qty = 1;
            // }
            $("#qty").val(qty);
        })
        
});
