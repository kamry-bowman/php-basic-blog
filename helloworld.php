<?php

  function foo() {
  $server_info = $_SERVER['HTTP_USER_AGENT'];
  $greeting = "Hiya {$server_info}";
  echo ($greeting);

  }
?>
<h1>
<?php
  echo(
    ""
    .foo()
    .phpinfo()
  );
?>
</h1>