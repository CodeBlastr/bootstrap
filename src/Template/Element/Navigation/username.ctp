<?php
$session = $this->request->session()->read();
?>

<?php if(!empty($session['Auth']['User'])) : ?>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><?= $session['Auth']['User']['username'] ?> <span class="caret"></span></a>
        <ul class="dropdown-menu" aria-labelledby="themes">
            <li><a href="/profile">My Profile</a></li>
            <li><a href="/dashboard">Dashboard</a></li>
            <li class="divider"></li>
            <li><a href="/logout">Logout</a></li>
        </ul>
    </li>
<?php else : ?>
    <li>
        <a href="/signup">Signup</a>
    </li>
    <li>
        <a href="/signup">Login</a>
    </li>
<?php endif; ?>
