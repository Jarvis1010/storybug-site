<div class="row">
    <div class="col-md-9">
        <div class="posts panel panel-default">
            
            <?php
                foreach ($rows as $row)
                {
                    print("<div class=\"post panel-body\">");
                    print("<h3 class =\"post title\">{$row["postTitle"]}</h3>");
                    print("<p class = \"post date\">{$row["Date"]}</p>");
                    print("{$row["Content"]}");
                    print("</div>");
                    print("<hr/>");
                }

            ?>
        </div>
    </div>
<div class="col-md-3 sidebar-offcanvas"><?php require $_SERVER["DOCUMENT_ROOT"] . '/views/sideBarConnectView.php';?></div>
</div>	