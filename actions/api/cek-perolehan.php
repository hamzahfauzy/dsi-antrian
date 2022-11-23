<?php

$perolehan = $_POST['perolehan'];
$request = simple_curl('http://bphtb.asahankab.go.id:8182/apps/ajax?action=cek-perolehan','POST',['perolehan'=>$perolehan]);

echo $request['content'];
die();
