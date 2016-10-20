<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, <?php print($_SESSION["firstname"]." ");?><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="/profile.php">My Profile</a></li>
    <li><a href="#" data-toggle="modal" data-target="#profileMod">Change Password</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="/logout.php">Logout</a></li>
  </ul>
</li>