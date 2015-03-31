<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'formular.php';
        $form = new formular("test.php", "POST", "TESTOVACI"); // vytvoření oběktu
        $form->input("text", "testovaci", "", "test", "asdf"); // vložení polí formuláře
        $form->input("radio", "testovaci", "", "test", "asdf");
        $form->input("radio", "testovaci", "", "test", "asdf");
        $form->input("submit", "testovaci", "test", "test", "asdf");
        echo $form; // vypsání formuláře
        ?>
    </body>
</html>
