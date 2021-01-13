<?php
$fp=pfsockopen("192.168.11.19", 9100);
fputs($fp, "hello");
fclose($fp);