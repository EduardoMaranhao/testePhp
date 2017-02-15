
<?

for ($n = 0; $n <= 100; $n++) {

     $str = "";

     if ($n % 3 == 0) {
           $str .= 'Fizz';
     }
     
     if ($n % 5 == 0) {
            $str .= 'Buzz';
     }
     
     echo $n." ".$str."<br>";
            
}


?>