function loadPage(){

    //Call PHP to attempt to load profile info. Display info if successful. Else display error message.

    document.getElementById("content").innerHTML = "<p>Loading profile info...</p>";

    $.post("profile.php",
        {
        },

    function(result)
    {
        if (result == "loggedOut"){
            console.log("Logged out!");
            document.getElementById("content").innerHTML = "<p>You are not logged in. <a href=\"login.html\"><br><br>Click here to log in.</a></p>";
        }
        else {
            var info = JSON.parse(result);
            var num_info = info.length;
            document.getElementById("content").innerHTML = "";
            for (var i = 0; i < num_info; i++){
                document.getElementById("content").innerHTML += info[i];
            }
        }
    });
}
