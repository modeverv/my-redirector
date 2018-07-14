<?php
/* config */
$rule = [
    "0001" => "https://twitter.com",
    "0002" => "https://www.instagram.com",
    "大澤めぐみ" => "https://twitter.com/ohswmgm?lang=ja",
    /* insert url of want to redirect to here */
];

/* function */
/**
 * starts with
 */
function startsWith($haystack, $needle)
{
    return (mb_strpos($haystack, $needle) === 0);
}

/* main */
$path = isset($_SERVER['REQUEST_URI']) ? urldecode($_SERVER['REQUEST_URI']) : "/";
if ("/" != $path) {
    foreach ($rule as $k => $v) {
        if (startsWith("/" . $k, $path)) {
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
            <?php foreach ($rule as $k => $v) {?>
            <li><a href="<?php echo $k; ?>"><?php echo preg_replace("/^\//", "", $k); ?></a></li>
            <?php }?>
        </ul>
    </body>
</html>

