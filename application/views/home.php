<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("_layouts/header.php"); ?>
</head>

<body>
    <?php $this->load->view("_layouts/navbar.php"); ?>

    <?php $this->load->view("_contents/_home.php"); ?>
    
    <?php $this->load->view("_layouts/footer.php"); ?>

</body>

<?php $this->load->view("_layouts/js.php"); ?>

</html>