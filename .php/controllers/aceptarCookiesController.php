<?php

echo
"<script>

$('document').ready(function(){
    $('#aceptar').click(function(){".
            setCookie('cookiesAceptadas', 'aceptadas', time()+3600, '/');
    echo
    "});
});

</script>"

?>