<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="MartDevelopers Inc">
    <title>INVENTORY</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/icons/loogoo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/icons/loogoo.png">
    <link rel="manifest" href="assets/img/icons/site.webmanifest">
    <link rel="mask-icon" href="assets/img/icons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">
    <script src="assets/js/swal.js"></script>
    <?php if (isset($success)) { ?>
        <script>
            setTimeout(function() {
                    swal("Success", "<?php echo $success; ?>", "success");
                },
                100);
        </script>

    <?php } ?>
    <?php if (isset($err)) { ?>
        <script>
            setTimeout(function() {
                    swal("Failed", "<?php echo $err; ?>", "error");
                },
                100);
        </script>

    <?php } ?>
    <?php if (isset($info)) { ?>
        <script>
            setTimeout(function() {
                    swal("Success", "<?php echo $info; ?>", "info");
                },
                100);
        </script>

    <?php } ?>
    <script>
        function getCustomer(val) {
            $.ajax({
                type: "POST",
                url: "customer_ajax.php",
                data: 'custName=' + val,
                success: function(data) {
                    $('#customerID').val(data);
                }
            });

        }
        function validateTextarea(textarea, maxLength) {
        var input = textarea.value;
         if (input.length > maxLength) {
         textarea.value = input.substring(0, maxLength);
         }
            var remainingChars = maxLength - textarea.value.length;
            document.getElementById("charCount").innerHTML = remainingChars + " characters remaining";
}

    </script>
</head>