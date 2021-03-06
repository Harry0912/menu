$('input[name="kind"]').each(function() {
    $(this).click(function() {
        if ($(this).prop('checked')) {
            $($(this).val()).show();
        } else {
            $($(this).val()).hide();
        }
    });
});

function store()
{
    var kind = $('input[name="kind"]:checked').val();
    var name = $('#name').val();
    var price = $('#price').val();
    var url = $('#url').val();
    var csrf = $('#csrf').val();

    $.ajax({
        type:'POST',
        url:url,
        data:{_token:csrf, kind:kind, name:name, price:price},
        success:function() {
            alert('菜單新增成功!');
            document.location.href = '/';
        }
    });
}

function update()
{
    var id = $('#id').val()
    var name = $('#name').val();
    var price = $('#price').val();
    var url = $('#url').val();
    var csrf = $('#csrf').val();

    $.ajax({
        type:'PATCH',
        url:url,
        data:{_token:csrf, id:id, name:name, price:price},
        success:function() {
            alert('菜單更新成功!');
            document.location.href = '/';
        }
    })
}

function destroy(id, csrf)
{
    var isConfirm = confirm('Do you want to delete the menu?');

    if (isConfirm) {
        $.ajax({
            type:'DELETE',
            url:'/delete/'+id,
            data:{_token:csrf, id:id},
            success:function() {
                alert('菜單刪除成功!');
                document.location.href = '/';
            }
        });
    }
}

function search(csrf)
{
    var keyword = $('#keyword').val();

    $.ajax({
        type:'POST',
        url:'/search/'+keyword,
        data:{_token:csrf, keyword:keyword},
        success:function(data) {
            $('body').html(data);
            $('#keyword').val(keyword);
        }
    });
}

function reset()
{
    document.location.href = '/';
}