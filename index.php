 <?php
        $con = mysqli_connect('HOSTNAME','USERNAME','PASSWORD');
        mysqli_select_db($con,'DBNAME');

        //define how many results you want per page

        $results_per_page = 20;

        $sql= "Select * from tbl1";
        $result = mysqli_query($con, $sql);
        $number_of_results = mysqli_num_rows($result);



        $number_of_pages = ceil($number_of_results/$results_per_page);

        if(!isset($_GET['page']))
        {
            $page = 1;
        }
        else
        {
            $page = $_GET['page'];
        }

        $this_page_first_result = ($page - 1) * $results_per_page;

        $sql = "Select * from tbl1 LIMIT ".$this_page_first_result.','.$results_per_page;
        $result = mysqli_query($con,$sql);?>
<div class="container">
<div class="row">
        <?php while ($row = mysqli_fetch_array($result))
        {
			?>
//Render html inside the loop
<div class=" col-md-3 card">
  
     <img alt="Card image cap" class="card-img-top " src="<?php echo $row[4]?>" />

  <div class="card-block text-center">
    <h4 class="card-title"><?php echo $row[1]?></h4>
    <p class="card-text">R <?php echo $row[2]?>.00</p>
  </div>

</div>
<?php
        }
  echo '</div>';
   echo '</div><br>';
   
echo   "<div class='row'>";
    echo "<div class='col-md-6'>";
   echo "<nav aria-label='Page navigation '>";
   echo "<ul class='pagination'>";
        for ($page=1;$page <= $number_of_pages;$page++)
        {
            echo ' <li class="page-item"><a class="page-link" href="index.php?page='.$page.'">'.$page.'</a></li>';
        }
		echo "</ul>";
		echo "</nav>";
		echo"</div>";
		echo "</div>";
    ?>
