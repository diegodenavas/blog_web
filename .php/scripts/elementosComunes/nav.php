<nav id="navCompleto">
    <menu>
        <div id="iconoMenu"></div>
        <ul class="divisionesMenu">
        <li class="elementosMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=Blog semanal">Blog semanal</a></li>
            <li class="elementosMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=Páginas web">Páginas web</a></li>
            <li class="elementosMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=Aplicaciones web">Aplicaciones web</a></li>
            <li class="elementosMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=Otros proyectos">Otros proyectos</a></li>
            <?php
                if(!isset($_SESSION["nick_usuario"])) echo "<li class='elementosMenu' id='loginMenu'><a href='/aprendiendoaprogramar.com/login.php'>Login</a></li>";
                else echo "<li class='elementosMenu' id='opcionMenuUser'><a href='/aprendiendoaprogramar.com/.php/controllers/logoutController.php'>Logout " . $_SESSION['nick_usuario'] . "</a></li>";
            ?>
        </ul>
        <p class="divisionesMenu" id="logoMenu"><a href="/aprendiendoaprogramar.com/index.php">programadiario.com</a></p>
    </menu>
</nav>
