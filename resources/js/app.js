require('./bootstrap');

window.onLoadMorePage = function (view, count, skip){
    $('#loadMoreNews').prop('disabled', true);

    $.ajax({
        url: `/news/view/${view}/${count}/${skip}`,
        type: 'GET',
        success: function(data){
            $('#latestNews').append(data.list);
            $('#loadMoreNews').prop('disabled', false);
            skip += data.length;

            if(data.length === 0 || data.length < count){
                $('#noMoreNews').removeClass('d-none');
                $('#loadMoreNews').addClass('d-none');
            }
        }
    })
}
