function randomPost()
{

    //Call PHP to determine random post url. Load that page.

    $.post("random_post.php",
    {

    },

    function(result)
    {
        window.location.href = result;
    });

}
