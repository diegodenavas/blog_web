<nav id="navMobile">
    <ul>
        <div id="iconoMenuMobile"></div>
        <li class="opcionesMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=JavaScript">JavaScript</a></li>
        <li class="opcionesMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=PHP">PHP</a></li>
        <li class="opcionesMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=MySQL">MySQL</a></li>
        <li class="opcionesMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=Java">Java</a></li>
        <?php
            if(!isset($_SESSION["nick_usuario"])) echo "<li id='ultimoLi'><a href='/aprendiendoaprogramar.com/login.php'>Login</a></li>";
            else echo "<li id='ultimoLi'><a href='/aprendiendoaprogramar.com/.php/controllers/logoutController.php'>Logout " . $_SESSION['nick_usuario'] . "</a></li>";
        ?>
    </ul>
</nav>