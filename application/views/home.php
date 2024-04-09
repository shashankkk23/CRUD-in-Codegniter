<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
  </head>
  <body>
    <h1 class="text-center">ALL USERS</h1>
<?php if ($success = $this->session->flashdata('success')) { ?>
    <div class="alert alert-success">
      <?php echo $success;
} ?>
  </div>
  
    <table class="table">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1;
    if (isset($users)) {

      foreach ($users as $user) { ?>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $user->name; ?></td>
          <td><?php echo $user->Address; ?></td>
          <td><?php echo $user->Email; ?></td>
          <td><?php echo $user->Phone; ?></td>


          <td><a href="<?php echo base_url('home/edit/' . $user->SN); ?>" class="btn btn-primary">Edit</a></td>
          <td><a href="<?php echo base_url('home/delete/' . $user->SN); ?>" class="btn btn-danger" onclick = " return confirm('Please confirm before deleting data') ">Delete</a></td>
        </tr>
        <?php $i++;
      }
    } ?>

  </tbody>
</table>

<!-- <nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active" aria-current="page">
      <a class="page-link" href="#">2</a><span class= "sr-only">(current)</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav> -->

<?php echo $this->pagination->create_links(); ?>

<a href="<?php echo base_url('home/create') ?>" target="_blank" class="btn btn-primary">Add New User</a>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"</script>
  </body>
</html>