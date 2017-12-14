<?php
//$month = date('m');
//print $month;

$year = date('y');
print($year);
if(date('Y') > 7) {
print ($year - 4);
} else {
print ($year - 5);
}
?>