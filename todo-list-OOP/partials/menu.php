<html>

<head>
    <title>
        Food Order Website
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script>
        // Wait for the DOM to be ready
        document.addEventListener('DOMContentLoaded', function () {
            var closeButton = document.querySelector('.close');
            closeButton.addEventListener('click', function () {
                var errorMessage = document.querySelector('.error');
                errorMessage.parentNode.removeChild(errorMessage);
            });
        });
    </script>
</head>
<?php
?>