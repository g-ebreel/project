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
            .remember{
                vertical-align: bottom;
            }
            b{
                text-transform: uppercase;
            }
        </style>
        <?php
        include_once 'admin-setup/setup.php';
        include_once 'database.php';
        include_once 'login.php';
        ?> 
    </head>
    <body>
        <div class="container">
            <div class="vertical-space"></div><!--.vertical-space-->
            <?php
            if (is_login()) {
                ?>
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <span class="navbar-brand">Welcome <?php echo $_SESSION['username']; ?><a href="login.php?logged_out=true" > (logout) </a></span>
                        </div>
                    </div>
                </nav>
                <br><br><br>
                <div class="row phonebook">
                    <div class="col-md-12">
                        <div class="panel panel-default"><!--.container-->
                            <div class="panel-heading"><b>Phonebook</b></div><!--.panel-heading-->
                            <div class="panel-body">
                                <ul class="nav nav-tabs">
                                    <li><a href="#phoneList">phoneList</a></li>
                                    <li><a href="#phoneAdd">phoneAdd</a></li>
                                    <li><a href="#GroupList">GroupList</a></li>
                                    <li><a href="#addGroup">GroupAdd</a></li>
                                    <li><a href="#phoneSearch">phoneSearch</a></li>
                                </ul><!--.nav-tabs-->
                                <div class="nav-content" id="phoneList">
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
                                            $query = "SELECT * FROM contacts";
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
                                </div><!--.nav-content-->
                                <div class="nav-content" id="phoneAdd">
                                    <form action="addContact.php" method="post" role="form">
                                        <div class="form-group">
                                            <label for="fname">First name</label>
                                            <input id="fname" name="fname" class="form-control" placeholder="Enter contact's first name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="lname">Last name</label>
                                            <input id="lname" name="lname" class="form-control" placeholder="Enter contact's last name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="pnumber">Phone number</label>
                                            <input id="pnumber" name="pnumber" class="form-control" placeholder="Enter contact's phone" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="group">Group*</label>
                                            <select class="form-control" id="group" name="group">
                                                <option disabled selected >Select GroupName...</option>
                                                <?php
                                                $query = "SELECT * FROM groups";
                                                $query_result = mysqli_query($link, $query);
                                                while ($result = mysqli_fetch_object($query_result)) {
                                                    echo '<option value="' . $result->id . '">' . $result->group_name . '</option>';
                                                }
                                                ?>
                                            </select><!--#group-->
                                        </div>
                                        <input name="add_contact" class="btn btn-default" type="submit" value="Add Contact">
                                    </form>
                                </div><!--.nav-content-->
                                <div class="nav-content" id="GroupList">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Group name</th>
                                                <th>Contact group</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM groups";
                                            $query_result = mysqli_query($link, $query);
                                            if ($query_result->num_rows) {
                                                //have group
                                                while ($row_obj = mysqli_fetch_object($query_result)) {
                                                    $group_id = $row_obj->id;
                                                    $contact_query = "SELECT id FROM contacts WHERE group_id={$group_id}";
                                                    $result = mysqli_query($link, $contact_query);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row_obj->group_name; ?></td>
                                                        <td><?php echo $result->num_rows; ?></td>
                                                        <td><a href="removeGroup.php?remove_group=true&group_id=<?php echo $row_obj->id; ?>" title="remove group">Remove</a> | <a href="editGroup.php?edit_group=true&group_id=<?php echo $row_obj->id; ?>" title="edit group">Edit</a></td>
                                                    </tr>    
                                                    <?php
                                                }
                                            } else {
                                                //have'nt group
                                                ?>
                                                <tr class="text-center">
                                                    <td colspan="3"><b>No group was founded</b></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div><!--#GroupList-->
                                <div class="nav-content" id="addGroup">
                                    <form action="addGroup.php" method="post" role="form">
                                        <div class="form-group">
                                            <label for="group-add">Group name</label>
                                            <input id="group-add" class="form-control" name="group" placeholder="Enter group name" type="text">
                                        </div>
                                        <input class="btn btn-default" type="submit" name="add_group" value="Add Group">
                                    </form>
                                </div><!--.nav-content-->
                                <div class="nav-content" id="phoneSearch">
                                    <form action="searchContact.php" method="post" role="form">
                                        <div class="form-group">
                                            <label for="fname">First name</label>
                                            <input id="fname" name="fname" class="form-control" placeholder="Enter contact's first name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="lname">Last name</label>
                                            <input id="lname" name="lname" class="form-control" placeholder="Enter contact's last name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="group">Group</label>
                                            <select class="form-control" id="group" name="group">
                                                <option disabled selected >Select GroupName...</option>
                                                <?php
                                                $query = "SELECT * FROM groups";
                                                $query_result = mysqli_query($link, $query);
                                                while ($result = mysqli_fetch_object($query_result)) {
                                                    echo '<option value="' . $result->id . '">' . $result->group_name . '</option>';
                                                }
                                                ?>
                                            </select><!--#group-->
                                        </div>
                                        <input class="btn btn-default" name="search_contact" type="submit" value="Search">
                                    </form>
                                </div><!--.nav-content-->
                            </div><!--.panel-body-->
                        </div><!--.panel-default-->
                    </div><!--.col-md-12-->
                </div><!--.phonebook-->
                <?php
            } else {
                ?>
                <div class="row login">
                    <div class="col-md-4 hidden-sm"></div>
                    <div class="col-md-4">
                        <form action="login.php" method="post">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Login</b><span class="login-msg"><?php ?></span></div><!--.panel-header-->
                                <div class="panel-body">
                                    <div class="form-group"><input type="text" name="username" class="form-control" placeholder="username"></div>
                                    <div class="form-group"><input type="password" name="password" class="form-control" placeholder="password"></div>
                                    <label><input type="checkbox" name="remember" class="remember" > Remember me</label>
                                </div><!--.panel-body-->
                                <div class="panel-footer clearfix">
                                    <input class="btn btn-default pull-right" type="submit" name="login" value="Login">
                                </div><!--.panel-footer-->
                            </div><!--.panel-default-->
                        </form>
                    </div>
                    <div class="col-mx-4 hidden-sm"></div>
                </div><!--.login-->
            <?php } ?>
        </div><!--.container-->
    </div><!--.container-->

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".nav-tabs li").removeClass("active");
            $(".nav-tabs li:first-child").addClass("active");
            $(".nav-content").first().show();
            $(".nav-tabs li a").click(function () {
                $(".nav-tabs li").removeClass("active");
                $(this).parent("li").addClass("active");
                var nav_content = $(this).attr("href");
                console.log(nav_content);
                $(".nav-content").hide();
                $(nav_content).fadeIn();
            });
        });
    </script>
</body>
</html>
