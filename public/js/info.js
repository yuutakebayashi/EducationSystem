function destroy(){
    $('.info__delete__btn').on('click', function() {
        var deleteConfirm = confirm('削除しますか？');
        if(deleteConfirm == true) {
            var clickEle = $(this)
            var articleID = clickEle.attr('data-article_id');
            var deleteTarget = clickEle.closest('tr');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: 'destroy',
                dataType: 'json',
                data: {'id': articleID},
            })
            .done(function() {
                console.log('通信成功');
                deleteTarget.remove();
            })
            .fail(function() {
                console.log('通信失敗');
                alert('エラー');
            });
        }  else {
            (function(e) {
              e.preventDefault()
            });
        };
      });
    };