function loadContent()
{

    //Call PHP to log user out.

    $.post("logout.php",
    {

    },

    function(result)
    {
        message.innerHTML = 'You are now logged out.'
    });


}
