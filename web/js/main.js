function showCart(cart){
$('#cart .modal-body').html(cart);
$('#cart').modal();
}


$('#cart .modal-body').on('click','.glyphicon-remove',function(){
    var id=$(this).data('id');
    var status=0;
    $.ajax({
        url:'/cart/del-item',
        data:{id:id,status:status},
        type:'GET',
        success:function(res){
            if(!res){alert(
                'ПУстой рес!');
            }
            showCart(res);
            //console.log(res);
        },
        error:function(){
            alert('Error!');
        }
    });
})
$('.glyphicon-removeOrder').on('click',function(){
    var id=$(this).data('id');
    var status=1;
    $.ajax({
        url:'/cart/del-item',
        data:{id:id,status:status},
        type:'GET',
        success:function(res){
            if(!res){alert(
                'ПУстой рес!');
            }
           // showCart(res);
           location.reload();
            console.log('ds');
        },
        error:function(){
            alert('Error!');
        }
    });
})
function getCart(){
    $.ajax({
        url:'/cart/show',
        type:'GET',
        success:function(res){
            if(!res){alert(
                'ПУстой рес!');
            }
            showCart(res);
          //  console.log(res);
        },
        error:function(){
            alert('Error!');
        }
    });
}
function clearCart(){
    $.ajax({
        url:'/cart/clear',
        type:'GET',
        success:function(res){
            if(!res){alert(
                'ПУстой рес!');
            }
            showCart(res);
          //  console.log(res);
        },
        error:function(){
            alert('Error!');
        }
    });
    return false;
}
$('.add-to-cart').on('click',function(e){
    e.preventDefault();
    var id=$(this).data('id'),
    qty=$('#qty').val();
    shop=$('#allbook-id').val();
    if(shop==0){
        alert('Выберете магазин!');
    }else{
    $.ajax({
        url:'/cart/add',
        data:{id:id,qty:qty,shop:shop},
        type:'GET',
        success:function(res){
            if(!res){
                alert('ПУстой рес!');
            }
                showCart(res);
            
            //console.log(res);
        },
        error:function(){
            alert('Error!');
        }
    });}
})
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })