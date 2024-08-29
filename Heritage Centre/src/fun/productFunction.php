<?php
    function fetchProductData(){
        global $db;
        $productId = $_GET['productId'];
        $selectProducts = "SELECT * FROM products WHERE productId='$productId'";
        $runSelectProducts = mysqli_query($db, $selectProducts);
        $fetchProduct = mysqli_fetch_array($runSelectProducts);
        $productTitle = $fetchProduct['productTitle'];
        $productPhoto = $fetchProduct['photo'];
        $sellerId = $fetchProduct['sellerId'];
        $cost = $fetchProduct['cost'];
        $numOfProducts = $fetchProduct['numOfProducts'];
        $productDescription = $fetchProduct['description'];
        $catogryProduct = $fetchProduct['category'];
        echo"
            <div>
                <img src='products/$productPhoto' width='100%' class='shadow-lg border rounded' height='300px' />
            </div>
            <h3 class='mt-2'>$productTitle</h3>
            <p><b>Price: ₹$cost</b></p>
            <div class='d-flex' style='gap: 0.5rem;'>
                <form method='post'>
                    <input type='hidden' name='addCartProductIdH' value='$productId' />
                    <button class='btn btn-primary btn-lg' name='addCartProductBtn' type='submit'>Add to cart</button>
                </form>
                <form method='post'>
                    <input type='hidden' name='buynowH' value='$productId' />
                    <button class='btn btn-danger btn-lg' name='buyNowBtn' type='submit'>Buy Now</button>
                </form>
            </div>
            <div class='mt-3'>
                <p>$productDescription</p>
            </div>
        ";
        echo "<h3>Review's and Feedbacks</h3>";
        echo"
            <form method='post'>
                <div class='mb-2'>
                    <textarea required='required' name='feedbackField' placeholder='Enter feedback here' class='form-control form-control-lg'></textarea>
                </div>
                <div class='mb-2'>
                    <select name='feedback' class='form-control'>
                        <option disabled>Select ratings</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                    </select>
                </div>
                <div class='mb-3'>
                    <button type='submit' class='btn btn-primary btn-llg' name='feedbackBtn'>Submit</button>
                </div> 
            </form>
        ";
        if(isset($_POST['feedbackBtn'])){
            $feedbackText = mysqli_real_escape_string($db, $_POST['feedbackField']);
            $ratings = $_POST['feedback'];
            $insertFeedback = "INSERT INTO `reviews`(`productId`, `stars`, `feedback`) VALUES ('$productId', '$ratings','$feedbackText')";
            $runInsertFeedback = mysqli_query($db, $insertFeedback);
            if($runInsertFeedback){
                echo"
                    <script>
                        window.alert('Feedback Successfully');
                    </script>
                ";
            }else{
                echo"
                    <script>
                        window.alert('Feedback Failed, Please try again');
                    </script>
                ";
            }
        }
    }

    function DisplayFeedback(){
        global $db;
        $productId = $_GET['productId'];
        $selectReviews = "SELECT * FROM reviews WHERE productId='$productId'";
        $runReview = mysqli_query($db, $selectReviews);
        while($fetchReviews = mysqli_fetch_array($runReview)){
            $points = $fetchReviews['stars'];
            $feedback = $fetchReviews['feedback'];
            echo"
                <hr>
                <div class='container border shadow-sm p-3'>
                   Stars: <b>$points/5</b>
                   <p>$feedback</p>
                <div>
            ";
        }
    }
?>