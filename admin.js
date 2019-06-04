function deletePost()
{

    //Call PHP code to delete post with postID entered by admin.

    var postID = document.getElementById("deletePost").value;
    document.getElementById("deletePost").value = "";

    $.post("deletePost.php",
    {
        postID: postID
    },

    function(result)
    {
        console.log(result);
    });

}

function banUser()
{

    //Call PHP code to ban user with username entered by admin.

    var username = document.getElementById("banuser").value;
    document.getElementById("banuser").value = "";

    $.post("banUser.php",
    {
        username: username
    },

    function(result)
    {
        console.log(result);
    });

}

function deleteComment()
{

    //Call PHP code to delete comment with commentID entered by admin.

    var commentID = document.getElementById("deleteComment").value;
    document.getElementById("deleteComment").value = "";

    $.post("deleteComment.php",
    {
        commentID: commentID
    },

    function(result)
    {
        console.log(result);
    });

}

function changePassword()
{

    //Call PHP code to change user's password. User is the username of the entry to update, pass is the new password.

    var user = document.getElementById("username").value;
    var pass = document.getElementById("password").value;
    document.getElementById("username").value = "";
    document.getElementById("password").value = "";

    $.post("changePassword.php",
    {
        user: user,
        pass: pass
    },

    function(result)
    {
        console.log(result);
    });

}

function checkPrivilege(){

    //Check if user is an admin. Display admin tools if so. Else display error message.

    $.post("checkPrivilege.php",
    {
    },

    function(result)
    {
        console.log(result);
        if(result == "yes"){
            document.getElementById("access").innerHTML = `
                <h1>Admin Panel</h1>
                <label for=\"banuser\">Enter username to ban user: </label>
                <input type = "text" id = \"banuser\"><br><br>
                <button onclick=\"banUser()\">Submit</button>
                <span class="error" id=\"fnameErr\"></span><br><br>
                <label for=\"deletePost\">Enter PostID (find PostID in post URL) to delete Post: </label>
                <input type = \"text\" id = \"deletePost\"><br><br>
                <button onclick=\"deletePost()\">Submit</button>
                <span class=\"error\" id=\"lnameErr\"></span><br><br>
                <label for=\"deleteComment\">Enter CommentID (find CommentID after date below comment) to delete Comment: </label>
                <input type = \"text\" id = \"deleteComment\"><br><br>
                <button onclick=\"deleteComment()\">Submit</button>
                <span class=\"error\" id=\"emailErr\"></span><br><br>
                <label for=\"username\">Enter user's username to change user's password: </label>
                <input type = \"text\" id = \"username\">
                <span class=\"error\" id=\"userErr\"></span><br><br>
                <label for=\"password\">Enter user's new password: </label>
                <input type = \"password\" id = \"password\">
                <span class=\"error\" id=\"passErr\"></span><br><br>
                <button onclick=\"changePassword()\">Submit</button>
                `
        }
        else{document.getElementById("access").innerHTML = "<h1>You are not logged into an admin account.</h1>"}
    });
}
