
<?php
  include("api.php");
  $taskData = getTaskData() 
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<style>
  table {
    		    font-family: arial, sans-serif;
    		    border-collapse: collapse;
    		    width: 100%;
    		}
    		td, th {
    		    border: 1px solid #dddddd;
    		    text-align: left;
    		    padding: 8px;
    		}
</style>
</head>
<body>
<div class="container py-auto">
 <div class="row justify-content-center">
   <div class="col-sm-10">
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr>
         <th>Task</th>
         <th>Title</th>
         <th>Description</th>
         <th>Color Code</th>
    </thead>
    <tbody>
       <!-- PHP CODE TO FETCH DATA FROM ROWS -->
       <?php
                foreach($taskData as $row)
                {
            ?>
            <tr>
                <td><?php echo $row['task'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['description'];?></td>
                <td style="background-color: <?php echo $row['colorCode']; ?>;">
            </tr>
            <?php
                }
            ?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
</body>
</html> 