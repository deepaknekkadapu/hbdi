<?php include '../includes/topnav.php' ?>
<?php include_once('../includes/login_loader.php'); ?>

<div class="container" style="width: 90%; max-width: 900px">

    <?php
    $sql = " SELECT id_user, email, username, name_first, name_last, affiliation 
            FROM user WHERE email = '$email_hbdi' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();

    $id_user = $result['id_user'];
    $username = $result['username'];
    $email = $result['email'];
    $name_first = $result['name_first'];
    $name_last = $result['name_last'];
    $affiliation = $result['affiliation'];

    //            function test_input($data)
    //            {
    //                $data = trim($data);
    //                $data = stripslashes($data);
    //                $data = htmlspecialchars($data);
    //                return $data;
    //            }
    //
    //            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //                $email = test_input($_POST['email']);
    //                $username = test_input($_POST['username']);
    //                $first_name = test_input($_POST['first_name']);
    //                $last_name = test_input($_POST['last_name']);
    //            }

    ?>

    <!-- ////////// THE FORM ////////// -->
    <div class="box-wrap">
        <!--    HBDI log in Header -->
        <header class="box-header-wrap">
            <div class="box-header">
                <span> HBDI </span>
            </div>
            <div class="box-header2">
                <spsan> Edit account information</spsan>
            </div>
        </header>

        <section style="padding-top: 35px; margin: 0 auto; ; width: 280px ">
            <form name="form" method="POST" action="">

                <div>
                    <input class="input_field" value="Email: <?php echo $email_hbdi ?>"
                           disabled>
                    <div id="email_error"></div>
                </div>

                <div>
                    <input class="input_field" value="Username: <?php echo $username; ?>" disabled
                           placeholder=" ">
                    <div id="title_error"></div>
                </div>
                <div>
                    <input class="input_field"
                           placeholder="Title: <?php echo $title; ?> ">
                    <div id="email_error"></div>
                </div>
                <div>
                    <input class="input_field"
                           placeholder="First Name: <?php echo $name_first; ?> ">
                    <div id="email_error"></div>
                </div>
                <div>
                    <input class="input_field"
                           placeholder="Middle Name: <?php echo $name_middle; ?> ">
                    <div id="email_error"></div>
                </div>
                <div>
                    <input class="input_field"
                           placeholder="Last Name: <?php echo $name_last; ?> ">
                    <div id="email_error"></div>
                </div>
                <div>
                    <input class="input_field"
                           placeholder="Affiliation: <?php echo $affiliation; ?> ">
                    <div id="email_error"></div>
                </div>
                <div>
                    <input type="submit" id="submit" name="submit" class="input_field"
                           style="width: 75px"
                           value="Submit">

                    </button>
                    <a href=<?php echo $p ?>/dashboard.php
                       style="text-decoration: none">
                           <span style="float:right; margin-top: 10px; border: 1px solid grey;
border-radius: 4px; height: 40px; width: 65px; padding: 8px 10px">
                             Cancel
                           </span>
                    </a>
                </div>
            </form>
        </section>
    </div>
</div>

