$(document).ready(function () {
    $('.delete').click(function () {
        if (confirm('Are you sure ???')) {
            let id = $(this).attr('data-id');
            let origin = location.origin
            $.ajax({
                url: origin + '/book/delete/' + id,
                method: 'GET',
                type: 'json',
                success: function (res) {
                    $('#book-' + id).remove();
                },
                error: function (error) {
                    alert('error');
                }
            })
        }
    })
})
