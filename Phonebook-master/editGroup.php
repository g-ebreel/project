<?php
if (isset($_GET['edit_group']) && $_GET['edit_group'] == 'true') {
    $group_id = $_GET['group_id'];
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Edit group</title>
            <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
            <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" >
            <style>
                .vertical-space{
                    display: block;
                    width: 100%;
                    margin: 70px auto;
                }
                .nav-content{
                    display: none;
                    padding: 20px 0;
                }
            </style>
            <?php
            include_once 'database.php';
            ?>
        </head>
        <body>
            <div class="container">
                <div class="vertical-space"></div><!--.vertical-space-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-defult panel-primary">
                            <div class="panel-heading">Edit Contact</div>
                            <div class="panel-body">
                                <?php
                                $query = "SELECT * FROM groups WHERE id={$group_id}";
                                $result = mysqli_query($link, $query);
                                $row_obj = mysqli_fetch_object($result);
                                ?>
                                <form action="updateGroup.php?group_id=<?php echo $row_obj->id; ?>" method="post" role="form">
                                    <div class="form-group">
                                        <label for="group">Group name</label>
                                        <input id="group" name="group_name" class="form-control" value="<?php echo $row_obj->group_name; ?>" type="text">
                                    </div>
                                    <input name="edit_group" class="btn btn-default" type="submit" value="Edit Group">
                                </form>
                            </div><!--.panel-body-->
                        </div><!--.panel-->
                    </div><!--.row-->
                </div><!--.row-->
            </div><!--.container-->
        </body>
    </html>
    <?php
} else {
    header("Location: index.php");
}