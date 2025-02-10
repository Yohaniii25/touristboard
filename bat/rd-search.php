<?php

// include('../includes/dbconfig.php');

include('../includes/function.php');


$string=$_GET['s'];

$termssearch=search_terms($string);

?>

  <div id="search-results">

    <div class='search-quick-result'>Quick Results</div>


    <ol class="search-list">

            <li class="search-list-item">

              <?php
              // echo "oo"; 
              // echo $string;
              // print_r($termssearch);

            $numRows = $termssearch->num_rows;

            // Assuming $result is your MySQLi result object
            while ($row = $termssearch->fetch_assoc()) {
                // Print the value of the 'dest_name' column

                echo '<a  style="color:gray;" href="/destination.php?destid='.$row['id'].'&action=search_result"  >'.$row['dest_name'] .' <span style="font-size:11px;">( category: '.$row['category'].' )</span></a>'. "<br>";
            }

            if($numRows==0)
            {
              echo "No Result Found";
            }

              ?>


            </li>
    </ol>



         

