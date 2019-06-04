function onButton()
{

    //Send username and password to PHP to attempt to log user in. If successful, take user to profile page.
    //Else, display error message.

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    document.getElementById("message").innerHTML = "Logging you in...";

    $.post("login.php",
    {
        username: username,
        password: password
    },

    function(result)
    {
        console.log(result);
        if (result.includes("banned")){
            document.getElementById("message").innerHTML = "Account banned.";
        }
        else if (result.search('success') == -1){
            document.getElementById("message").innerHTML = "Username/password pair is incorrect.";
        }
        else{window.location.href = 'profile.html';}
    });

}
