<?php
echo
"<div id='confirmarBorrarPost'>
    <p>¿Deseas borrar este post?</p>
    <br><br>
    <a href='.php/controllers/borraPost.php?name=". $post[0]->getTitulo() ."' id='borraPost'><input type='button' value='Si' id=confirmarBorrarPostSi></a>
    <input type='button' value='No' id=confirmarBorrarPostNo>
</div>"
?>