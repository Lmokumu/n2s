<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
for($i=1;$i<=5;$i++){
echo  helloWorld("Maryline",$i,'blue');
echo  helloWorld("Nikolei",$i,'green');
}
?> 


<?php
function helloWorld($name,$size,$color) {
echo '<h'.$size. ' style="color: '.$color.'">';
echo 'Hello '.$name.'!';
echo '</h'.$size.'>';
}
?> 


</body>
</html>
