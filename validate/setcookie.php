<?php

setcookie('example', 'Hello World', time() +60 * 60 *24 * 2);

echo "Cookie set";