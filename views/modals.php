<?php    
    if (!isset($error)){
        print("<div class=\"modal fade\" id=\"register\">");
    }else{
        print("<div class=\"modal show\" id=\"register\">");
    }
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Register</h4>
          </div>
          <form action="register.php" method="post">
          <div class="modal-body">
            <div class="form-group">
                <label for="formGroupExampleInput">First Name</label>
                <input type="text" class="form-control" name="firstname" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Confirm Password</label>
                <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password">
            </div>
            <?php if (isset($error)):?>
                <div class="alert alert-warning" role="alert"><?= htmlspecialchars($error) ?></div>
            <?php endif?>    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
          </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php
    if (!isset($loginerror)){
        print("<div class=\"modal fade\" id=\"login\">");
    }else{
        print("<div class=\"modal show\" id=\"login\">");
    }
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Register</h4>
          </div>
          <form action="login.php" method="post">
          <div class="modal-body">
            <div class="form-group">
                <label for="formGroupExampleInput">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $_COOKIE["username"] ?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                <input type="hidden" name="url" value="<?=$_SERVER['REQUEST_URI']?>">
            </div>
            <?php if (isset($loginerror)):?>
                <div class="alert alert-warning" role="alert"><?= htmlspecialchars($loginerror) ?></div>
            <?php endif?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
          </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
<?php if (isset($_SESSION['id'])):?>
     <div class="modal fade" id="profileMod">
     <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Profile</h4>
          </div>
          <div class="modal-body">
                <?php require $_SERVER["DOCUMENT_ROOT"] . '/views/profileSnapshot.php';?>
                <button type="button" class="btn btn-primary">Change Password</button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endif?>