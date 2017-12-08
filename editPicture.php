<?php if (isset($_GET['id']) ){

    $id = $_GET['id'] = (int)$_GET['id'];

    ?>
    <script>
        $(".popup").show();
        $('.overlay').show();
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