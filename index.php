<?php
include("api.php");
$taskData = getTaskData()
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="static/index.css">
</head>
<body>
  <div class="container py-auto">
    <div class="row justify-content-center">
      <div class="my-3">
        <h1 style="color:#3498db;">Task List </h2>
      </div>
      <div class="col-sm-12" style="margin:0 6em;">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover mt-2" id="taskTable">
            <thead>
              <tr>
                <th>Task</th>
                <th>Title</th>
                <th>Description</th>
                <th>Color Code</th>
              </tr>
            </thead>
            <tbody>
              <!-- PHP CODE TO FETCH DATA FROM ROWS -->
              <?php
              foreach ($taskData as $row) {
              ?>
                <tr>
                  <td><?php echo $row['task']; ?></td>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['description']; ?></td>
                  <td style="background-color: <?php echo $row['colorCode']; ?>;">
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <!--Image Modal Section-->
      <div class="central">
        <button class="pure-button success-button" data-toggle="modal" data-target="#imgModal">Open The Modal</button>
      </div>
      <div id="imgModal" class="modal fade" role="dialog">
        <div class="modal-dialog  modal-lg">
          <div class="modal-content text-center">
            <div class="modal-header mx-auto text-muted">
              <h3 id="imgModalLabel">Add an Image</h1>
            </div>
            <div class="modal-body">
              <div class="file-upload">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                <div class="image-upload-wrap">
                  <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                </div>
                <div class="file-upload-content">
                  <img class="file-upload-image" src="#" alt="your image" width="auto" height="auto"/>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="success-button"  data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>
   <!-- Javascript Libraries-->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    function displayTaskData() {
      $(document).ready(function() {
        var dataTable = $('#taskTable').DataTable();

      });
    }

    function refreshTableData() {
      displayTaskData();
      console.log('hey I am here')
      setTimeout(refreshTableData, 60 * 60 * 1000);
    }

    refreshTableData();

    function readURL(input) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('.image-upload-wrap').hide();

        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();

        $('.image-title').html(input.files[0].name);
      };

      reader.readAsDataURL(input.files[0]);


    }
  </script>

</body>

</html>