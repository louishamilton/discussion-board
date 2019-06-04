function onButton()
{

    //Checks if user create post data is valid. Call PHP to add post to database if so.
    //Else display error message(s).

    var message = document.getElementById('message');
    message.innerHTML = '';

    var title = document.getElementById("title").value;
    var content = document.getElementById('content').value;
    var good_request = true;
    console.log(title.length);
    if (title.length == 0){
        message.innerHTML += 'Please enter a title. ';
        good_request = false;
    }
    console.log(content.length);
    if (content.length == 0){
        message.innerHTML += 'Please enter content. ';
        good_request = false;
    }
    console.log(good_request);

    if (good_request == true){
        message.innerHTML = 'Preparing your post...';

        $.post("create_post.php",
        {
            title: title,
            content: content
        },

        function(result)
        {
            console.log(result);
            if(result == "invalid"){
                message.innerHTML = 'Please log in to create a post.';
            }
            else{
                window.location.href = 'feed.html';
            }
        });
    }
}
