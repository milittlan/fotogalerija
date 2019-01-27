<?php require_once("../includes/initialize.php"); ?>
<?php

    if ($session->is_logged_in()) {

        include_layout_template('user_logged_in_header.php');

    }  else {

        include_layout_template('user_logged_out_header.php');

    }
?>

<?php


    // 1. the current page number ($current_page)
    $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    // 2. records per page ($per_page)
    $per_page = 4;

    // 3. total record count ($total_count)
    $total_count = Photograph::count_all();

    // find all photos
    // $photos = Photograph::find_all();

    $pagination = new Pagination($page, $per_page, $total_count);

    $sql = "SELECT * FROM photographs ";
    $sql .= "LIMIT {$per_page} ";
    $sql .= "OFFSET {$pagination->offset()}";
    $photos = Photograph::find_by_sql($sql);

?>



<?php include_layout_template('header.php'); ?>

<?php foreach ($photos as $photo): ?>
<div style="float:left; margin-left:20px;">
    <a href="photo.php?id=<?php echo $photo->id; ?>">
        <img src="<?php echo $photo->image_path();  ?>" alt="<?php echo $photo->caption; ?>" width="200"  />
    </a>
    <h4><?php echo $photo->caption; ?></h4>
</div>
<?php endforeach; ?>

<div id="pagination" style="clear:both;">


    <?php

    if ($pagination->total_pages() > 1 ) {

        if ($pagination->has_previous_page()) {
            echo "<a href=\"index.php?page=";
            echo $pagination->previous_page();
            echo "\">&laquo; Previous</a> ";
        }

        for ($i=1; $i <= $pagination->total_pages(); $i++) {
            if ($i == $page) {
                echo " <span class=\"selected\">{$i}</span> ";
            } else {
                echo " <a href=\"index.php?page={$i}\">{$i}</a> ";
            }
        }

        if ($pagination->has_next_page()) {
            echo "<a href=\"index.php?page=";
            echo $pagination->next_page();
            echo "\">Next &raquo;</a> ";
        }

    }

    ?>

</div>

<?php include_layout_template('footer.php'); ?>