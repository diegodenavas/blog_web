<nav>
    <menu>
        <ul class="divisionesMenu">
            <li class="elementosMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=JavaScript">JavaScript</a></li>
            <li class="elementosMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=PHP">PHP</a></li>
            <li class="elementosMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=MySQL">MySQL</a></li>
            <li class="elementosMenu"><a href="/aprendiendoaprogramar.com/view_section.php?section=Java">Java</a></li>
            <?php
                if(!isset($_SESSION["nick_usuario"])) echo "<li class='elementosMenu'><a href='/aprendiendoaprogramar.com/login.php'>Login</a></li>";
                else echo "<li class='elementosMenu'><a href='/aprendiendoaprogramar.com/.php/controllers/logoutController.php'>Logout " . $_SESSION['nick_usuario'] . "</a></li>";
            ?>
        </ul>
        <p class="divisionesMenu" id="logoMenu"><a href="/aprendiendoaprogramar.com/index.php">aprendiendoaprogramar.com</a></p>
    </menu>
</nav>
