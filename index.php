<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Maryline's Number to String</title>
    </head>
    <body>
        <p>Input a number:</p> 
        <form action ='index.php' method='get'>
        <input type='text' name='number' value="<?php echo $_REQUEST['number']?>">
        <input type='submit' name='submitBtn' text='OK' value='OK'>
        </form>
        <br>
        <?php
           include 'rottenNTSScript.php';
        ?>
    </body>
</html>
