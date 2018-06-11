<?php
for ( $e = 1; $e <= 100; $e++ ) {
    if ( $e % 15 == 0) {


        echo 'FizzBuzz<br/>';

    } else if ( $e % 5 == 0) {

        echo 'Buzz<br/>';

    } else if (  $e % 3 == 0 ) {
      echo 'Fizz<br/>';

    } else {
        echo $e;
        echo "<br/>";
    }
}
echo "finish<br/>";
?>
