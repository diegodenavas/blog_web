<nav id="navMobile">
    <ul>
        <div id="iconoMenuMobile"></div>
        <li class="opcionesMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=Blog semanal">Blog semanal</a></li>
        <li class="opcionesMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=Páginas web">Páginas web</a></li>
        <li class="opcionesMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=Aplicaciones web">Aplicaciones web</a></li>
        <li class="opcionesMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=Otros proyectos">Otros proyectos</a></li>
        <?php
            if(!isset($_SESSION["nick_usuario"])) echo "<li id='ultimoLi'><a href='/aprendiendoaprogramar.com/login.php'>Login</a></li>";
            else echo "<li id='ultimoLi'><a href='/aprendiendoaprogramar.com/.php/controllers/logoutController.php'>Logout " . $_SESSION['nick_usuario'] . "</a></li>";
        ?>
    </ul>
</nav>