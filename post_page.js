function loadContent(postWanted)
{

    //Call PHP to load post content. Then display content on page.

    var timezone = new Date().getTimezoneOffset();
    timezone = timezone + 120;
    console.log(timezone);

    $.post("post_page.php",
    {
        timezone: timezone,
        postID: postWanted
    },

    function(result)
    {
        console.log(result);
        if(result == "0"){
            console.log(result);
            document.getElementById("post_title").innerHTML = "Post Not Found";
            document.getElementById("post_content").innerHTML = "";
        }
        else{
            var post_data = JSON.parse(result);
            console.log(post_data);
            document.getElementById("content").innerHTML = post_data[0];
            document.getElementById("post_title").innerHTML = post_data[1];
            document.getElementById("date").innerHTML = "<small>" + post_data[2] + " by User: " + post_data[3] + "</small>";
            var comments = JSON.parse(post_data[4]);
            var num_comments = comments.length;
            document.getElementById("comments").innerHTML = "";
            for (var i = 0; i < num_comments; i++){
                var comment = JSON.parse(comments[i]);
                console.log(comment);
                document.getElementById("comments").innerHTML += comment[1] + "<br>" + "<small>    by:  " + comment[0] + " on " + comment[2] + " ID: " + comment[3] + "</small><br><br>";
            }
            document.getElementById("post_score").innerHTML = "";
            document.getElementById("post_score").innerHTML = "Popularity: " + post_data[6];
            document.getElementById("comment").value = "";
        }
    });


}

function processForm(postWanted)
{

    //Call PHP to attempt to add comment on post.

    message.innerHTML = 'Preparing comment...';
    comment = document.getElementById("comment").value;
    console.log(comment.length);
    if (comment.length == 0){
        message.innerHTML = 'Please enter a comment to submit. ';
    }
    else{
        $.post("add_comment.php",
        {
            postID: postWanted,
            comment: comment
        },

        function(result)
        {
            console.log(result);
            loadContent(postWanted);
            message.innerHTML = '';
            if(result == "invalid"){
                message.innerHTML = 'Please log in to write a comment.';
            }
            else{document.getElementById("comment").value = '';}
        });
    }
}

function like_post(postWanted)
{

    //Call PHP to attempt to like post.

    $.post("like_post.php",
    {
        postID: postWanted
    },

    function(result)
    {
        console.log(result);
    });

}

function dislike_post(postWanted)
{

    //Call PHP to attempt to dislike post.

    $.post("dislike_post.php",
    {
        postID: postWanted
    },

    function(result)
    {
        console.log(result);
    });

}
