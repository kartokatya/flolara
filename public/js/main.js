

$(function() {
    $('.add').click(function() {
        var id = $(this).data('id');
        var user = $(this).data('user');
        var token = $(this).data('token');
        $.ajax({
            url:'/cart',
            data:{"_token":token,
                "id":id,
                "user":user
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