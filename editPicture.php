<?php if (isset($_GET['id']) ){

    $id = $_GET['id'] = (int)$_GET['id'];

    ?>
    <script>
        $(".popup").fadeIn(200);
        $('.overlay').fadeIn(200);
    </script>
    <?php

    if (!empty($_FILES['image'])){
        ?>
        <script>
            $(".upload form").submit();
        </script>
        <?php
    }

}