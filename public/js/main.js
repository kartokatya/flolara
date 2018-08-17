

$(function() {
    $('.add').click(function() {
        var id = $(this).data('id');
        var token = $(this).data('token');
        $.ajax({
            url:'/cart',
            data:{"_token":token,
                "id":id,
            },
            type:'POST',
            success: function (res) {
                console.log(res);
            },
            error:function () {
                alert('Error');
            }
        })
    });
});

$(function() {
    $('.deleteCart').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var token = $(this).data('token');
        var method = "DELETE";
        $.ajax({
            url:'/cart/'+id,
            data:{"_token":token,
                "_method": method,
            },
            type:'POST',
            success: function (result) {
                document.write(result);
            },
            error:function () {
                alert('Error');
            }
        })
    });
});