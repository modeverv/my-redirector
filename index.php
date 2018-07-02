<?php
/* config */
$config = [
    "/0001" => "https://twitter.com",
    "/0002" => "https://www.instagram.com",
    /* insert url of want to redirect to here */
];

/* function */
/**
 * starts with
 */
function startsWith($haystack, $needle)
{
    return (strpos($haystack, $needle) === 0);
}

/* main */
$path = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "/";
if ("/" != $path) {
    foreach ($config as $k => $v) {
        if (startsWith($k, $path)) {
            header("Location:" . $v);
            exit();
        }
    }
}
?><!DOCTYPE html>
<html lang="ja">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Redirector</title>
    </head>
    <body>
        <h1>My Redirector</h1>
        <ul>
            <?php foreach ($config as $k => $v) {?>
            <li><a href="<?php echo $k; ?>"><?php echo preg_replace("/^\//", "", $k); ?></a></li>
            <?php }?>
        </ul>
    </body>
</html>

