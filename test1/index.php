<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<form action="index.php" method="post">
<table>
<tr>
<td>String : </td>
<td><input type="text" name="string"></td>
</tr>
<tr>
<td>Index Position : </td>
<td><input type="number" name="index"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="Check Index"></td>
</tr>
</table>
</form>
<?php if(isset($_POST['string']) && isset($_POST['index']) ){?>
<span><?php echo GetCloseParentBracket($_POST['string'],$_POST['index']);?></span>
<?php } ?>

</body>
</html>

<?php
function GetCloseParentBracket($string,$index){
$arr=array();
 if(substr($string,$index,1) != '('){
       echo "Invalid Index,No Match Pharenthesis Found";
       exit;
    }

for($i=$index-1;$i < strlen($string);$i++) {
   
    if(substr($string,$i,1) == '(') {
        array_push($arr,$i);

    } elseif(substr($string,$i,1) == ')') {
        array_pop($arr);
        if(count($arr) < 1) {
           echo "The position of closing bracket in index : ". $i;
           return;
        }

    }
}

}
?>
