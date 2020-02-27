<?php
include_once 'database.php';
if (isset($_POST['search_contact'])) {
    if(isset($_POST['group'])) mysqli_real_escape_string($link , strip_tags(htmlspecialchars($group = $_POST['group'])));
    if(isset($_POST['fname'])) mysqli_real_escape_string($link , strip_tags(htmlspecialchars($fname = $_POST['fname'])));
    if(isset($_POST['lname'])) mysqli_real_escape_string($link , strip_tags(htmlspecialchars($lname = $_POST['lname'])));
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Phonebook</title>
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
                .text-center{
                    text-align: center;
                }
                b{
                    text-transform: uppercase;
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
                        <div class="panel panel-info">
                            <div class="panel-heading">Search Contact</div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Phone</th>
                                            <th>Group</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($group)){
                                            $query = "SELECT * FROM contacts WHERE group_id={$group} AND first_name LIKE '%{$fname}%' AND last_name LIKE '%{$lname}%'";
                                        }else{
                                            $query = "SELECT * FROM contacts WHERE first_name LIKE '%{$fname}%' AND last_name LIKE '%{$lname}%'";
                                        }
                                        $query_result = mysqli_query($link, $query);
                                        if ($query_result->num_rows !== 0) {
                                            while ($result = mysqli_fetch_object($query_result)) {
                                                $group_id = $result->group_id;
                                                $group_query = "SELECT group_name FROM groups WHERE id = {$group_id}";
                                                $group_query_result = mysqli_query($link, $group_query);
                                                $group_result = mysqli_fetch_object($group_query_result);
                                                $group_name = $group_result->group_name;
                                                mysqli_free_result($group_query_result);
                                                ?>
                                                <tr>
                                                    <td><?php echo $result->first_name; ?></td>
                                                    <td><?php echo $result->last_name; ?></td>
                                                    <td><?php echo $result->phone_number; ?></td>
                                                    <td><?php echo $group_name; ?></td>
                                                    <td><a href="removeContact.php?remove_contact=true&contact_id=<?php echo $result->id; ?>" title="">remove</a> | <a href="editContact.php?edit_contact=true&contact_id=<?php echo $result->id; ?>" title="">Edit</a></td>
                                                </tr>
                                                <?php
                                            }
                                            mysqli_free_result($query_result);
                                        } else {
                                            ?>
                                            <tr class="text-center">
                                                <td colspan="5"><b>No contact was founded</b></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <a href="index.php" class="btn btn-info btn-block" >Back To PhoneBook</a>
                            </div><!--.panel-body-->
                        </div><!--panel-info-->
                    </div><!--.col-md-12-->
                </div><!--.row-->
            </div><!--.container-->
        </body>
    </html>
    <?php
} else {
    header('Location: index.php');
}    