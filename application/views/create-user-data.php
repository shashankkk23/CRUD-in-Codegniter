<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $title; ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center">Add User</h1>
    <div class="col-md-6">
        <h4 class="text-center">Add User Detail</h4>
        <hr>

        <?php if ($failed = $this->session->flashdata('success')) { ?>
            <div class="alert alert-success">
                <?php echo $failed; ?>
            </div>
        <?php } ?>

        <form class="mt-4" method="post" action="<?php echo base_url('home/userValidation') ?>" onsubmit="return validateForm()">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo set_value('name'); ?>">
                <?php echo form_error('name'); ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control" value="<?php echo set_value('address'); ?>">
                <?php echo form_error('address'); ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                <?php echo form_error('email'); ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>">
                <?php echo form_error('phone'); ?>
            </div>

            <br>

            <button type="submit" class="btn btn-primary text-center">Submit</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function validateForm() {
        var name = document.getElementById('name').value;
        var address = document.getElementById('address').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;

        if (name.trim() == '') {
            alert('Please enter your name.');
            return false;
        }
        if (address.trim() == '') {
            alert('Please enter your address.');
            return false;
        }
        if (email.trim() == '') {
            alert('Please enter your email.');
            return false;
        }
        if (phone.trim() == '') {
            alert('Please enter your phone number.');
            return false;
        }
        return true;
    }
</script>

</body>
</html>
