window.onload = function(){
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Add a new comment
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

        // Fetch all comments
        function fetchComments()
        {
            $.ajax({
                url: '/get-comments/' + $('#post_id').val(),
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let comments = response.comments;
                    let commentsList = $('.display-comment');
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

        // like button
        $('#likePostBtn').click(function(e){
            e.preventDefault();
            let formData = {
                'post_id': $('#post_id').val(),
            };
            $.ajax({
                type: 'POST',
                url: '/posts/' + $('#post_id').val() + '/like',
                dataType: 'json',
                data: formData,
                success: function(data) {
                    fetchLikes();
                },
                error: function(error) {
                    console.log(error);
                }
            })
        });

        // fetch total like count
        function fetchLikes()
        {
            $.ajax({
                url: '/likes/' + $('#post_id').val(),
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    let likeCount = response.likes;
                    $('#likesTotal').text(likeCount);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
}