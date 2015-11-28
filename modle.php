<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  p {
    font-family: "Times New Roman";
    font-size: 20px;
}</style>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Modal </h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Delete</button>

  <!--  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@  !-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header" style="background-color:green"></div>
        <div class="modal-body">
          <p style="color:black"> Are you sure to delete?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info btn-md" data-dismiss="modal">Delete</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>
  <!-- @@@@@@@@@@@@@@@@@@@@@ !-->

</body>
</html>