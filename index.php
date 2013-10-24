<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
ModPack Builder Beta
</title>
<?php @ require_once ('stylefile.html'); ?>
</head>
<body>
<?php @ require_once ('top.html'); ?>
<?php @ require_once ('menu.html'); ?>
<div id='main'>
<div id='inner'>

<?php
$pagename = preg_replace("/[^a-z0-9\/]/i", "", $_GET['page']);
if(file_exists($pagename.'.html')) {
    @ require_once ($pagename.'.html');
}
elseif(file_exists($pagename.'.php')) {
    @ require_once ($pagename.'.php');
} else {
    @ require_once ('main.html');
}
?>
            
</div>
</div>
<?php @ require_once ('right.html'); ?>
<p></p>
<?php @ require_once ('footer.html'); ?>
</body>
</html>
