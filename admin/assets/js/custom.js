$(document).ready(function (){

    alertify.set('notifier','position', 'top-right');

    $(document).on('click', '.increment' ,function(){
        var $quntityInput =$(this).closest('.qtyBox').find('.qty');
        var productId =$(this).closest('.qtyBox').find('.prodId').val();

        var curruntValue =parseInt($quntityInput.val());

        if(!isNaN(curruntValue)){
            var qtyVal=curruntValue+1;
            $quntityInput.val(qtyVal);
            quntityIncDec(productId,qtyVal);
        }


    });

    $(document).on('click', '.decrement' ,function(){
        var $quntityInput =$(this).closest('.qtyBox').find('.qty');
        var productId =$(this).closest('.qtyBox').find('.prodId').val();

        var curruntValue =parseInt($quntityInput.val());

        if(!isNaN(curruntValue) && curruntValue > 1){
            var qtyVal=curruntValue-1;
            $quntityInput.val(qtyVal);
            quntityIncDec(productId,qtyVal);
        }


    });

    function quntityIncDec(prodId,qty){

        $.ajax({
            type : "POST",
            url:"order-code.php",
            data : {
                    'productIncDec':true,
                    'product_id':prodId,
                    'quntity':qty
            },
            success : function(response){

                var res =JSON.parse(response);
                //console.log(res);      
                
                if(res.status==200){
                   //window.location.reload();
                   $('#productArea').load(' #productContent')
                    alertify.success(res.message);
                }else{
                    alertify.error();(res.message);
                }

            }



        });
    }

    //plase order

    $(document).on('click','.proceedToPlace' ,function() {

        console.log('proceedToPlace');

        var payment_mode = $('#payment_mode').val();
        var cphone = $('#cphone').val();

        if(payment_mode == ''){

            swal("Select Payment Mode","Select your payment mode","warning");
            return false;
        }
        if(cphone == '' && !$.isNumeric(cphone)){

            swal("Enter Phone Number","Enter valid Phone Number","warning");
            return false;
        }
    });


});