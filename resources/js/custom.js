window.onload = function(){
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('#addCommentBtn').click(function(e){
            e.preventDefault();
            let formData = {
                'content': $('#content').val(),
                'post_id': $('#post_id').val(),
            };
            $.ajax({
                type: 'POST',
                url: '/comments/',
                dataType: 'json',
                data: formData,
                success: function(data) {
                    console.log('Data Saved');
                    $('#content').val('');
                    fetchComments();
                },
                error: function(error) {
                    console.log(error);
                }
            })
        });

        fetchComments();

        function fetchComments()
        {
            $.ajax({
                url: '/get-comments/' + $('#post_id').val(),
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var comments = response.comments;
                    var commentsList = $('.display-comment');
                    commentsList.empty();

                    comments.forEach(function(comment) {
                        commentsList.append('<strong>' + comment.user.name + '</strong>');
                        commentsList.append('<p>' + comment.content + '</p>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
}