<div class="row">
    <div class="col-md-12">
        <img width='300px' class="img-responsive center-block" src="/img/logo large.png">
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <?php 
                    require $_SERVER["DOCUMENT_ROOT"] . '/views/profileSnapshot.php';
                    if($rows['id']!=$_SESSION['id']){   
                        print("<div class=\"panel-footer\"><button id=\"buddyRequest\" type=\"submit\" class=\"btn btn-primary\">Buddy Request</button></div>");
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <ul class="nav navbar-nav">
              <li><a href="/">Stories: <span class="badge">0</span></a></li>
              <li><a>Buddies: <span class="badge"><?=count($friends)?></span></a></li>
              <?php if($rows['id']==$_SESSION['id']):?>
                <li><a>Buddy Requests: <span class="badge"><?=count($requests)?></span></a></li>
              <?php endif ?>
            </ul>
          </div>
        </nav>
        <div class=" col-md-9">
            <div class="container-fluid">
                <div class="row">
                <?php
                    foreach($friends as $friend){
                        print("<div class=\"col-md-4 col-xs-3\">");
                        print("<div class=\"panel panel-default\">");
                        print("<div class=\"panel-body text-center\">");
                        print("<a href= \"/profile.php?username=".$friend['username']."\"><img class=\"img-responsive center-block\" src=\"http://placehold.it/200x200\">");
                        print("<div>".$friend['firstName']."</div>");
                        print("<div>".$friend['username']."</div></a>");
                        print("</div>");
                        print("</div>");
                        print("</div>");
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
        			