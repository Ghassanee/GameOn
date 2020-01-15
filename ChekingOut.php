<?php $file = file_get_contents('header.php');
$content = eval("?>$file");
echo $content;
include_once 'DataBaseConnection.php';
?>

<div  class="row"  >
    <div  class="col-lg-9 mx-auto">
        <div id="Bank" class="bg-white rounded-lg shadow-sm p-5">

            <ul role="tablist"  class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                <li class="nav-item" >
                    <a data-toggle="pill" href="#nav-tab-card" class="nav-link active  rounded-pill">
                        <i id="credit" class="fa fa-credit-card"></i>
                        Credit Card
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link  rounded-pill">
                        <i class="fab fa-paypal"></i>
                        Paypal
                    </a>
                </li>

            </ul>




            <div class="tab-content">


                <div id="nav-tab-card"  class="tab-pane fade show active">
                   
                    <form action="ThanksPage.php" style="color: black !important;"  role="form">
                        <div class="form-group">
                            <label for="username">Full name (on the card)</label>
                            <input type="text" name="username" placeholder="Jason Doe" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Address </label>
                            <input type="text" name="Address" placeholder="your address" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cardNumber">Card number</label>
                            <div class="input-group">
                                <input type="text" name="cardNumber"  placeholder="Your card number" class="form-control" required>
                                <div class="input-group-append">
                    <span class="input-group-text text-muted">
                                                <i class="fab fa-cc-visa"></i>
                                                <i class="fab fa-cc-amex mx-1"></i>
                                                <i class="fab fa-cc-mastercard mx-1"></i>
                                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label><span class="hidden-xs">Expiration</span></label>
                                    <div class="input-group">
                                        <input type="number" onkeydown="return false" placeholder="MM" name="" class="form-control" min="1" max="12" required>
                                        <input type="number" onkeydown="return false" placeholder="YY" name="" class="form-control" min="<?php echo getdate()[year]; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-4">
                                    <label data-toggle="tooltip"  >CVV
                                        <i class="fa fa-question-circle" title="Three-digits code on the back of your card"></i>
                                    </label>
                                    <label>
                                        <input type="text" required class="form-control">
                                    </label>
                                </div>
                            </div>



                        </div>
                        <input  type="submit" style=" width: 10%  ; background-color:#563d7c ;  margin: 0 auto ; font-size: 20px !important; " class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"  value="Confirm" > </input>
                    </form>
                </div>

                <div id="nav-tab-paypal" class="tab-pane fade">
                    <p>Paypal is easiest way to pay online</p>
                    <p>
                        <a style="text-decoration: none ; font-size: 15px; color: white " href="ThanksPage.php">  <button type="button"  class="btn btn-primary rounded-pill"> Log into my Paypal <i  class="fab fa-paypal"></i></button></a>
                    </p>
                    <p class="text-muted">Pay with paypal and get your game now .
                    </p>
                </div>
                </div>
            </div>
        </div>
    </div>

                <?php $file = file_get_contents('footer.php');
                $content = eval("?>$file");
                echo $content; ?>
