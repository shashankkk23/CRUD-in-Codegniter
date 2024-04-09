<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $title; ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
</head>
<body>


<div class="container mt-4">
    <h1 class="text-center">Edit User Detail</h1>
    <div class="col-md-6">

        

        <?php if ($failed = $this->session->flashdata('success')) { ?>
      <div class="alert alert-success">
        <?php echo $failed; }?>
      </div>
  

  
      <form class="mt-4" method="post" action="<?php echo base_url('home/edit/'.$SN); ?>">

<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo set_value('name',$user->name); ?>">
    <?php echo form_error('name'); ?>
</div>
<div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" name="address" class="form-control" value="<?php echo set_value('address',$user->address); ?>" placeholder="Enter New Address">
    <?php echo form_error('address'); ?>
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" id="exampleInputEmail1" name="email" class="form-control" value="<?php echo set_value('email',$user->email); ?>">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    <?php echo form_error('email'); ?>
</div>
<div class="mb-3">
    <label class="form-label">Phone</label>
    <input type="text" name="phone" class="form-control" value="<?php echo set_value('phone',$user->phone); ?>" placeholder="Enter New Mobile No.">
    <?php echo form_error('phone'); ?>
</div>

  <br>

  <button type="submit" class="btn btn-primary text-center" onclick="return confirm('Are you sure want to update details')">Update</button>
</form>
</div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"</script>
</body>
</html>