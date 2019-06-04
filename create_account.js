function onButton()
{

    //Check that account creation user data is valid. If valid, call PHP to add to database and log user in.
    //Else display error message(s)

    var fname = document.getElementById("firstname").value;
    var lname = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var user = document.getElementById("username").value;
    var pass = document.getElementById("password").value;

    var fna = false;
    var lna = false;
    var una = false;
    var pas = false;
    var em = false;

    if (fname == "")
    {
      document.getElementById("fnameErr").innerHTML = "Please enter your Firstname.";
    }
    else if (/^[a-zA-Z]+$/.test(fname) != true)
    {
      document.getElementById("fnameErr").innerHTML = "Please enter a real Firstname.";
    }
    else
    {
      document.getElementById("fnameErr").innerHTML = "";
      fna = true;
    }

    if (lname == "")
    {
      document.getElementById("lnameErr").innerHTML = "Please enter your Lastname.";
    }
    else if (/^[a-zA-Z]+$/.test(lname) != true)
    {
      document.getElementById("lnameErr").innerHTML = "Please enter a real Lastname.";
    }
    else
    {
      document.getElementById("lnameErr").innerHTML = "";
      lna = true;
    }

    if (email == "")
    {
      document.getElementById("emailErr").innerHTML = ("Please enter an e-mail address.");
    }
    else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) != true )
    {
      document.getElementById("emailErr").innerHTML = ("Please enter a valid e-mail address.");
    }
    else
    {
        document.getElementById("emailErr").innerHTML = "";
        em = true;
    }

    if (user == "")
    {
      document.getElementById("userErr").innerHTML = "Please enter your name.";
    }
    else if (/^[a-zA-Z0-9]+$/.test(user) != true)
    {
      document.getElementById("userErr").innerHTML = "Please enter a real name.";
    }
    else
    {
      document.getElementById("userErr").innerHTML = "";
      una = true;
    }

    if (pass == "")
    {
      document.getElementById("passErr").innerHTML = "Please enter a password.";
    }
    else if (/^[a-zA-Z0-9]+$/.test(pass) != true)
    {
      document.getElementById("passErr").innerHTML = "Please enter a valid password.";
    }
    else
    {
      document.getElementById("passErr").innerHTML = "";
      pas = true;
    }

    if(fna && lna && una && pas && em)
    {
        var message = document.getElementById('message');
        message.innerHTML = 'Welcome ' + fname + ', preparing your account...';

        $.post("create_account.php",
        {
            fname: fname,
            lname: lname,
            email: email,
            user: user,
            pass: pass
        },

        function(result)
        {
            console.log(result);
            var results = JSON.parse(result);
            var login = true;
            if (results[0] == "username"){
                document.getElementById("userErr").innerHTML = "Username is already taken.";
                document.getElementById('message').innerHTML = "";
                var login = false;
            }

            if (results[1] == "email"){
                document.getElementById("emailErr").innerHTML = "Email is already taken.";
                document.getElementById('message').innerHTML = "";
                var login = false;
            }

            if (login){

                $.post("login.php",
                {
                    username: user,
                    password: pass
                },

                function (result){
                    window.location.href = 'profile.html';
                });
            }
        });
    }
}
