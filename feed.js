function loadPosts()
{

    //Call PHP to load posts in order of recency. Display posts in feed.

    document.getElementById("links").innerHTML = "<p>Loading feed...</p>";
    document.getElementById("mode").innerHTML = "Recent";
    var timezone = new Date().getTimezoneOffset();
    timezone = timezone + 120;
    console.log(timezone);

    $.post("feed.php",
    {
        timezone: timezone
    },

    function(result)
    {
        console.log(result);
        var posts = JSON.parse(result);
        var num_posts = posts.length;
        document.getElementById("links").innerHTML = "";
        for (var i = 0; i < num_posts; i++){
            var post = JSON.parse(posts[i]);
            var url = "<big><a href=\"htmlpostpage.php?p=" + post[2] + "\">" + post[0] + "</a>  by: " + post[3] + "  <small>" + post[1] + "</small></big><br><br>" + post[4] + "<br><br>";
            document.getElementById("links").innerHTML += url;
            //document.getElementById("links").innerHTML += post[1];
            //document.getElementById("links").innerHTML += post[2];
            //document.getElementById("links").innerHTML += "<br><br>";
        }

    });

}

function popular()
{

    //Call PHP to load posts in order of likes minus dislikes. Display posts in feed.

    document.getElementById("links").innerHTML = "<p>Loading feed...</p>";
    document.getElementById("mode").innerHTML = "Popular";
    var timezone = new Date().getTimezoneOffset();
    timezone = timezone + 120;

    $.post("popular.php",
    {
        timezone: timezone
    },

    function(result)
    {
        console.log(result);
        var posts = JSON.parse(result);
        var num_posts = posts.length;
        document.getElementById("links").innerHTML = "";
        for (var i = 0; i < num_posts; i++){
            var post = JSON.parse(posts[i]);
            var url = "<big><a href=\"htmlpostpage.php?p=" + post[2] + "\">" + post[0] + "</a>  by: " + post[3] + "  <small>" + post[1] + "</small></big><br><br>" + post[4] + "<br><br>";
            document.getElementById("links").innerHTML += url;
            //document.getElementById("links").innerHTML += post[1];
            //document.getElementById("links").innerHTML += post[2];
            //document.getElementById("links").innerHTML += "<br><br>";
        }
    });

}

function updatePopularity()
{

    //Call PHP to update popularity and relevancy for all posts.

    $.post("updatePopularity.php",
    {
    },

    function(result)
    {
        console.log("yay!")
    });
}

function topPosts()
{

    //Call PHP to load posts in order of relevancy for all posts. Display posts in feed.

    document.getElementById("links").innerHTML = "<p>Loading feed...</p>";
    document.getElementById("mode").innerHTML = "Top";
    var timezone = new Date().getTimezoneOffset();
    timezone = timezone + 120;
    console.log(timezone);

    $.post("top.php",
    {
        timezone: timezone
    },

    function(result)
    {
        console.log(result);
        var posts = JSON.parse(result);
        var num_posts = posts.length;
        document.getElementById("links").innerHTML = "";
        for (var i = 0; i < num_posts; i++){
            var post = JSON.parse(posts[i]);
            var url = "<big><a href=\"htmlpostpage.php?p=" + post[2] + "\">" + post[0] + "</a>  by: " + post[3] + "  <small>" + post[1] + "</small></big><br><br>" + post[4] + "<br><br>";
            document.getElementById("links").innerHTML += url;
        }
    });
}
