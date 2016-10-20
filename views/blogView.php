<div class="row">
    <div class="col-md-9">
        <div class="posts panel panel-default">
            
            <?php
                foreach ($rows as $row)
                {
                    print("<div class=\"post panel-body\">");
                        print("<article>");
                            print("<h3 class =\"post title\"><a href=\"/blog.php?post={$row["postTitle"]}\">{$row["postTitle"]}</a></h3>");
                            print(sprintf("<p class = \"post date\">%s</p>",date('jS \of F Y h:i:s A',strtotime($row["Date"]))));
                            print("{$row["Content"]}");
                        print("</article>");
                    print("</div>");
                    print("<hr/>");
                }

            ?>
        </div>
    </div>
<div class="col-md-3 sidebar-offcanvas"><?php require $_SERVER["DOCUMENT_ROOT"] . '/views/sideBarConnectView.php';?></div>
</div>	