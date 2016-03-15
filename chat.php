<!doctype html>
<html>
<head>
    <title>Franks Schach-Chat</title>
    <meta charset="utf-8">
</head>
<body>
<?php
    include ('db.class.php');
    include ('chat.class.php');
// Chat Ausgabe
    $chat = new Chat("Frank", "Gast");
// Chat Ausgabe
    $msgs = $chat->readMessage()

    //print_r($msgs);

    foreach($msgs as $item){
        echo §item['sender'] . '<br>'. $item['empf'].'<br>'.$item['msg'];
    }

?>
<form action="#" method="post">
    <label for="s">Sender: </label> <input id="s" type="text" name="s"><br>
    <label for="e">Emf&auml;nger: </label> <input type="text" name="e" id="e">
    <textarea name="msg"></textarea><br>
    <input type="submit" value="Senden" name="senden">
</form>

<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 12.03.2016
 * Time: 14:35
 */
if(isset($_POST('senden'))) {
    $chat = new Chat($_POST['e'], $_POST['s']);
    $chat->sendMessage($_POST['msg']);
}


?>
</body>
</html>
