<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Post</title>



        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="post_page.js"></script>
        <script>
          $(function(){
            var includes = $('[data-include]');
            jQuery.each(includes, function(){
              var file = $(this).data('include') + '.html';
              $(this).load(file);
            });
          });
        </script>

        <style>
            hr {
               display: block;
               position: relative;
               padding: 0;
               margin: 8px auto;
               height: 0;
               width: 100%;
               max-height: 0;
               font-size: 1px;
               line-height: 0;
               clear: both;
               border: none;
               border-top: 1px solid #aaaaaa;
               border-bottom: 1px solid #ffffff;
               z-index: -1;
            }
        </style>

        <style>html{visibility: hidden;opacity:0;}</style>

    </head>
    <body>
        <div data-include="header"></div>


        <h1 id="post_title">Loading post...</h1>
        <div id = "post_score"></div>
        <div id = "post_content">

        <p id="date"><small></small></p>


        <p id = "content"></p>

        <br>
        <script>
        var postWanted = <?php echo $_GET['p']; ?>;
            loadContent(postWanted);
        </script>
        <button onclick="like_post(postWanted)">Like</button>
        <button onclick="dislike_post(postWanted)">Dislike</button>
        <hr>
        <p><b><large>Comments:</large></b></p>
        <p id = "comments"></p>


        <br>





        <input type = "text" id = "comment"><br>
        <p id = "message"></p>
        <button onclick="processForm(postWanted)">Comment</button>
        </div>


    </body>
</html>
