<?php
session_start();
$file = file_get_contents('header.php');
$content = eval("?>$file");
echo $content;


include_once 'DataBaseConnection.php';
$activity = $_COOKIE["activity"];
$stmt = $pdo->query("select count(*) as count from User WHERE Activity='$activity'; ");
$row = $stmt->fetch();

if($row['count'] !=0){
    echo "<script>location.href='http://localhost/WebProject/HomePage.php?asirawaf7alk';</script>";
}
?>
<div class="container-fluid">
<div   class="row"  >
    <div  class="col-lg-9 mx-auto">
        <div  style="background-color: transparent !important;"id="Bank" class="bg-white rounded-lg shadow-sm p-5">

            <ul role="tablist"  class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                <li class="nav-item" >
                    <a data-toggle="pill" style="margin: 0 "  href="#nav-tab-SignUp" class="nav-link active  rounded-pill">
                        <i class="fas fa-user-plus"></i>
                        Sign Up
                    </a>
                </li>
                <li class="nav-item"  >
                    <a data-toggle="pill" style="margin: 0 " href="#nav-tab-SignIn" class="nav-link   rounded-pill">
                        <i class="fas fa-sign-in-alt"></i>
                        Sign In
                    </a>
                </li>

            </ul>




            <div class="tab-content" >
                <div id="nav-tab-SignUp" class="tab-pane active fade show ">

                    <form role="form" action="includes/form.inc.php"  method="post" >
                        <p class="alert alert-danger text-center"   <?php echo $_SESSION['successErr'] ; session_destroy(); if(!isset($_SESSION["noError"])) echo 'style="display: none"' ; ?> id="errors" ><?php echo $_SESSION['nameErr'].$_SESSION['mailErr'].$_SESSION['userErr'].$_SESSION['passErr'].$_SESSION['RpassErr'].$_SESSION['successErr'];  ?> </p>
                        <?php echo $_SESSION['success'] ;?>
                        <div class="form-group">
                            <label for="Fullname">Full name</label>
                            <input type="text" name="Fullname" placeholder="Ghassane Aboughazaouat"  value="<?php   echo $_SESSION["Fullname"] ; ?>" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" name="username" placeholder="Ghassane20a" value="<?php  echo $_SESSION["username"] ; ?>" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="EmailAddress">Email Address</label>
                            <div class="input-group">
                                <input type="email" name="EmailAddress" placeholder="Your Email Address" value="<?php echo $_SESSION["EmailAddress"] ; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="password" name="password" placeholder="Password" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Rpwd">Confirm Your Password</label>
                            <input type="password" name="Rpwd" placeholder="Password" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label><span class="hidden-xs">Birthday : </span></label>
                            <div class="input-group">
                                <input type="number"  onkeydown="return false" placeholder="DD" value="<?php echo $_SESSION["day"] ; ?>"   name="day" class="form-control" min="1" max="31" required>
                                <input type="number" placeholder="MM" name="month"  value="<?php echo $_SESSION["month"] ; ?>"  onkeydown="return false" class="form-control" min="1" max="12" required>
                                <input type="number" placeholder="YY" name="year"  value="<?php echo $_SESSION["year"] ; ?>"   class="form-control" onkeydown="return false"  min="1920" max="<?php echo getdate()['year']-13; ?>" required>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label data-toggle="tooltip"  >Gender :

                            </label>
                            <div class="input-group">
                                <div style="margin-right:60px " class=" custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline1" name="gender" value="Male"   <?php if($_SESSION['gender'] == "Male") echo "checked" ; ?>>
                                    <label class="custom-control-label" for="defaultInline1">Male</label>
                                </div>


                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline2" name="gender" value="Female"  <?php if($_SESSION['gender'] == "Female") echo "checked" ; ?> >
                                    <label class="custom-control-label" for="defaultInline2">Female</label>
                                </div>
                            </div>
                        </div>





                        <input id="button"  style="color: black"  name="submit" type="submit" value="Sign Up " > </form>
                </div>

                <div id="nav-tab-SignIn" class="tab-pane  fade ">
                    <form role="form" action="userLogIn.php"  method="post" >
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" name="userName" placeholder="User Name / Email" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="password" name="passWord" placeholder="Password" required class="form-control">
                        </div>

                        <input id="button" style="color: black" name="submitS" type="submit" value="Sign In " > </form>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
<!-- End -->
<?php $file = file_get_contents('footer.php');
$content = eval("?>$file");
echo $content; ?>
