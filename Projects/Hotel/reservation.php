<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Home Sweet Home - Checkout</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/reservation.css"/>
</head>

<body>
<?php
include('header.php')
?>

<main>
    <section id="topSection">
        <h1>Room Reservation</h1>
    </section>

    <section id="bottomSection">
        <section id="dataForm">

            <?php
            session_start();

            /* Go Back page - step 1 */
            $url = basename($_SERVER['PHP_SELF']);
            //$query = $_SERVER['QUERY_STRING'];
            //if($query){
              //  $url .= "?".$query;
           // }
            $_SESSION['current_page'] = $url;

            /*Definition of items to be displayed in input */
            $firstName = $lastName = $email = $address1 = $address2 = $state = $city =
            $zipCode = $numberOfGuests = $bedType = $betterVue = $checkInDate = $checkOutDate =
            $loyaltyMemberLabel = $breakfast = $smokingOption = "";

            /* Definition of errors*/
            $errors = 0;
            $firstNameErr = $lastNameErr = $emailErr = $address1Err =$address2Err = $stateErr =
            $cityErr = $zipCodeErr = $numberOfGuestsErr = $numberOfGuestsErr_sup2q = $numberOfGuestsErr_sup1k =
            $numberOfGuestsErr_del2q = $numberOfGuestsErr_del1k = $numberOfGuestsErr_s2q = $numberOfGuestsErr_s1k =
            $bedTypeErr = $betterVueErr = $checkInDateErr =
            $checkOutDateErr = $loyaltyMemberLabelErr = $breakfastErr = $smokingOptionErr = "";

            /**/


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                /* VALIDATION */
               if (isset($_POST["submit"])){

                   /* VALIDATION FOR FIRST NAME */

                   if (empty($_POST["firstName"])) {
                       $_SESSION["firstNameErr"] = "*** First Name cannot be empty ***";
                       $_SESSION["errors"] = $_SESSION["errors"] + 1;
                       $_SESSION["firstName"] = input($_POST["firstName"]);
                   } else {
                       //if (preg_match("/^[a-zA-Z ]*$/", $_SESSION["firstName"])) {
                       if (preg_match("/^[a-zA-Z ]*$/", $_POST["firstName"])) {
                           $_SESSION["firstName"] = input($_POST["firstName"]);
                           $_SESSION["firstNameErr"] = "";
                       }
                           // check if name only contains letters and whitespace
                           //if (!preg_match("/^[a-zA-Z ]*$/", $_SESSION["firstName"])) {
                       if (!preg_match("/^[a-zA-Z ]*$/", $_POST["firstName"])) {
                               $_SESSION["firstNameErr"] = "*** Only letters and white space allowed ***";
                               $_SESSION["errors"] = $_SESSION["errors"] + 1;
                               $_SESSION["firstName"] = input($_POST["firstName"]);
                           }
                   }

                   /* VALIDATION FOR LAST NAME */
                   if (empty($_POST["lastName"])) {
                       $_SESSION["lastNameErr"] = "*** Last Name cannot be empty ***";
                       $_SESSION["errors"] = $_SESSION["errors"] + 1;
                       $_SESSION["lastName"] = input($_POST["lastName"]);
                   } else {
                       //if (preg_match("/^[a-zA-Z ]*$/", $_SESSION["lastName"])) {
                       if (preg_match("/^[a-zA-Z ]*$/", $_POST["lastName"])) {
                           $_SESSION["lastName"] = input($_POST["lastName"]);
                           //$_SESSION["lastName"] = $_POST["lastName"];
                           $_SESSION["lastNameErr"] = "";
                       }
                       // check if name only contains letters and whitespace
                       //if (!preg_match("/^[a-zA-Z ]*$/", $_SESSION["lastName"])) {
                       if (!preg_match("/^[a-zA-Z ]*$/", $_POST["lastName"])) {
                           $_SESSION["lastNameErr"] = "*** Only letters and white space allowed ***";
                           $_SESSION["errors"] = $_SESSION["errors"] + 1;
                           $_SESSION["lastName"] = input($_POST["lastName"]);
                       }
                   }

                   /* VALIDATION FOR ADDRESS 1 */
                   if (empty($_POST["address1"])) {
                       $_SESSION["address1Err"] = "*** Address cannot be empty ***";
                       $_SESSION["errors"] = $_SESSION["errors"] + 1;
                       $_SESSION["address1"] = input($_POST["address1"]);
                   } else {
                       $_SESSION["address1"] = input($_POST["address1"]);
                       $_SESSION["address1Err"] = "";
                   }

                   /* VALIDATION FOR ADDRESS 2 */
                   if (isset($_POST["address2"])){
                       $_SESSION["address2"] = input($_POST["address2"]);
                   }

                   /* VALIDATION FOR STATE */
                   if (isset($_POST["state"])){
                       $_SESSION["state"] = input($_POST["state"]);
                   }

                   /* VALIDATION FOR CITY */
                   if (isset($_POST["city"])){
                       $_SESSION["city"] = input($_POST["city"]);
                   }

                   /* VALIDATION FOR ZIP CODE */
                    if (empty($_POST["zipCode"])) {
                        $_SESSION["zipCodeErr"] = "*** Zip Code cannot be empty ***";
                        $_SESSION["errors"] = $_SESSION["errors"] + 1;
                        $_SESSION["zipCode"] = input($_POST["zipCode"]);
                    } else {
                        if (preg_match("/^[0-9]{5}+$/", $_POST["zipCode"])) {
                            $_SESSION["zipCode"] = input($_POST["zipCode"]);
                            $_SESSION["zipCodeErr"] = "";
                        }
                        // check if name only contains numbers
                        if (!preg_match("/^[0-9]{5}+$/", $_POST["zipCode"])) {
                            $_SESSION["zipCodeErr"] = "*** Five numbers allowed only ***";
                            $_SESSION["errors"] = $_SESSION["errors"] + 1;
                            $_SESSION["zipCode"] = input($_POST["zipCode"]);
                        }
                    }

                   /* VALIDATION FOR BED TYPE */
                   if ($_POST["bedType"] == "") {
                       $_SESSION["bedTypeErr"] = "*** You have to select a type for your bed ***";
                       $_SESSION["errors"] = $_SESSION["errors"] + 1;
                       $_SESSION["bedType"] = $_POST["bedType"];
                   } else {
                       $_SESSION["bedType"] = $_POST["bedType"];
                       $_SESSION["bedTypeErr"] = "";
                   }

                   /* VALIDATION FOR NUMBER OF GUESTS */
                   if ($_POST["numberOfGuests"] == "") {
                       $_SESSION["numberOfGuestsErr"] = "*** You have to select (a) guest(s) ***";
                       $_SESSION["errors"] = $_SESSION["errors"] + 1;
                       $_SESSION["numberOfGuests"] = $_POST["numberOfGuests"];
                   } elseif (!($_POST["numberOfGuests"] == "")){
                       if ( $_POST["numberOfGuests"]>2 && $_SESSION["bedType"] == "Standard Room Superior (2 Queen Beds)"){
                           $_SESSION["numberOfGuestsErr_sup2q"] = "*** You have to select 1 guest or 2 guests ***";
                           $_SESSION["errors"] = $_SESSION["errors"] + 1;
                           $_SESSION["numberOfGuests"] = $_POST["numberOfGuests"];
                       }else{
                           $_SESSION["numberOfGuests"] = $_POST["numberOfGuests"];
                           $_SESSION["numberOfGuestsErr_sup2q"] = "";
                       }

                       if ($_SESSION["bedType"] == "Standard Room Superior (1 King Bed)" && $_POST["numberOfGuests"]>2){
                           $_SESSION["numberOfGuestsErr_sup1k"] = "*** You have to select 1 guest or 2 guests ***";
                           $_SESSION["errors"] = $_SESSION["errors"] + 1;
                           $_SESSION["numberOfGuests"] = $_POST["numberOfGuests"];
                   }else{
                           $_SESSION["numberOfGuests"] = $_POST["numberOfGuests"];
                           $_SESSION["numberOfGuestsErr_sup1k"] = "";
                       }

                       if ($_SESSION["bedType"] == "Suite (2 Queen Beds)" && $_POST["numberOfGuests"]>4){
                           $_SESSION["numberOfGuestsErr_s2q"] = "*** You have to select 1 guest or 2, 3, 4 guests ***";
                           $_SESSION["errors"] = $_SESSION["errors"] + 1;
                           $_SESSION["numberOfGuests_s2q"] = $_POST["numberOfGuests"];
                       }else{
                           $_SESSION["numberOfGuests"] = $_POST["numberOfGuests"];
                           $_SESSION["numberOfGuestsErr_s2q"] = "";
                       }

                       if ($_SESSION["bedType"] == "Standard Room Deluxe (2 Queen Beds)" && $_POST["numberOfGuests"]>2){
                           $_SESSION["numberOfGuestsErr_del2q"] = "*** You have to select 1 guest or 2 guests ***";
                           $_SESSION["errors"] = $_SESSION["errors"] + 1;
                           $_SESSION["numberOfGuests_del2q"] = $_POST["numberOfGuests"];
                       }else{
                           $_SESSION["numberOfGuests"] = $_POST["numberOfGuests"];
                           $_SESSION["numberOfGuestsErr_del2q"] = "";
                       }

                       if ($_SESSION["bedType"] == "Standard Room Deluxe (1 King Bed)" && $_POST["numberOfGuests"]>2){
                           $_SESSION["numberOfGuestsErr_del1k"] = "*** You have to select 1 guest or 2 guests ***";
                           $_SESSION["errors"] = $_SESSION["errors"] + 1;
                           $_SESSION["numberOfGuests_del1k"] = $_POST["numberOfGuests"];
                       }else{
                           $_SESSION["numberOfGuests"] = $_POST["numberOfGuests"];
                           $_SESSION["numberOfGuestsErr_del1k"] = "";
                       }

                       if ($_SESSION["bedType"] == "Suite (1 King Bed)" && $_POST["numberOfGuests"]>4){
                           $_SESSION["numberOfGuestsErr_s1k"] = "*** You have to select 1 guest or 2, 3 or 4 guests ***";
                           $_SESSION["errors"] = $_SESSION["errors"] + 1;
                           $_SESSION["numberOfGuests_s1k"] = $_POST["numberOfGuests"];
                       }else{
                           $_SESSION["numberOfGuests"] = $_POST["numberOfGuests"];
                           $_SESSION["numberOfGuestsErr_s1k"] = "";
                       }
                   }
               }

                   /* VALIDATION FOR BETTER VUE */





                   /* VALIDATION FOR CHECK-IN DATE */
                   date_default_timezone_set("America/New_York");
                   $today = date("m/d/y");

                   if (strtotime($_POST["checkInDate"]) >= strtotime($today)){
                       $_SESSION["checkInDate"] = $_POST["checkInDate"];
                       $_SESSION["checkInDateErr"] = "";
                   } else {
                       $_SESSION["errors"] = $_SESSION["errors"] + 1;
                       $_SESSION["checkInDateErr"] = " *** You must select either".$today." or after ***";
                   }

                   /* VALIDATION FOR CHECK-OUT DATE */
                   if (strtotime($_POST["checkOutDate"]) > strtotime($today) &&
                       strtotime($_POST["checkOutDate"]) > strtotime($_POST["checkInDate"])) {
                       $_SESSION["checkOutDate"] = $_POST["checkOutDate"];
                       $_SESSION["checkOutDateErr"] = "";
                       } else {
                           $_SESSION["checkOutDateErr"] = "*** You have to select a date that is after the check-in date ***";
                           $_SESSION["errors"] = $_SESSION["errors"] + 1;
                       }


                   /* VALIDATION FOR LOYALTY MEMBER */
                /*$_POST['loyaltyMemberLabel'] = 'gold';*/
                if (!(empty($_POST["loyaltyMemberLabel"]))){
                    $mysqli = new mysqli('127.0.0.1', 'root', 'xxxxxx', 'hotel');
                    $stmt = $mysqli->prepare("SELECT * FROM loyalty_member WHERE loyaltyMemberLabel = ?");
                    $stmt->bind_param("s", $_POST['loyaltyMemberLabel']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    //if ($result->num_rows === 0) exit('No rows');
                    if ($result->num_rows === 0)
                    {
                        echo "";
                    } elseif ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()) {
                        $loyaltyIds[] = $row['loyaltyMemberId'];
                        $loyaltyLabels[] = $row['loyaltyMemberLabel'];
                        }
                        var_export($loyaltyLabels);
                        echo "<br> $loyaltyLabels[0]";
                    }
                    $stmt->close();

                    if ($_POST["loyaltyMemberLabel"] == $loyaltyLabels[0]){
                        $_SESSION["loyaltyMemberLabel"] = $_POST["loyaltyMemberLabel"];
                        $_SESSION["loyaltyMemberErr"] = "";
                    } elseif(!($_POST["loyaltyMemberLabel"] == $loyaltyLabels[0])){
                        $_SESSION["loyaltyMemberLabel"] = $_POST["loyaltyMemberLabel"];
                        $_SESSION["loyaltyMemberErr"] = "*** This loyalty member type does not exist ***";
                        $_SESSION["errors"] = $_SESSION["errors"] + 1;
                    }

            } elseif(empty($_POST["loyaltyMemberLabel"])){
                    $_SESSION["loyaltyMemberLabel"] = $_POST["loyaltyMemberLabel"];
                    $_SESSION["loyaltyMemberErr"] = "";
                }

                /* VALIDATION FOR BREAKFAST */
                   if ($_POST["breakfast"] == ""){
                       $_SESSION["breakfastErr"] = "*** You have to indicate your breakfast choice ***";
                       $_SESSION["errors"] = $_SESSION["errors"] + 1;
                       $_SESSION["breakfast"] = $_POST["breakfast"];
                   } else {
                       $_SESSION["breakfast"] = $_POST["breakfast"];
                       $_SESSION["breakfastErr"] = "";
                   }


                /* VALIDATION FOR SMOKING OPTION */
                    /*if (isset($_POST["smokingOption"])){
                        $_SESSION["smokingOption"] = $_POST["smokingOption"];
                    }*/
                if ($_POST["smokingOption"] == ""){
                    $_SESSION["smokingOptionErr"] = "*** You have to indicate your smoking choice ***";
                    $_SESSION["errors"] = $_SESSION["errors"] + 1;
                    $_SESSION["smokingOption"] = $_POST["smokingOption"];
                } else {
                    $_SESSION["smokingOption"] = $_POST["smokingOption"];
                    $_SESSION["smokingOptionErr"] = "";
                }

                    header('Location: confirmation.php');
                    exit();
                }

            function input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            } ?>

            <div class="reservationContainer">
            <p id="formTitleText">Select your check-in and check-out dates, number of room, and number of people to
            check in</p>

            <!-- FORM DEFINITION -->
                <form method="post" class="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <table>
                        <th><h1>Customer Information</h1></th>
                        <tr>
                            <td><label for="firstName">First Name: </label></td>
                            <td><label>
                                    <input type="text" name="firstName"
                                           value="<?php echo isset($_SESSION["firstName"]) ? $_SESSION["firstName"] : '';?>">
                                </label></td>
                        </tr>

                        <tr>
                            <td><label for="lastName">Last Name: </label></td>
                            <td><label>
                                    <input type="text" name="lastName"
                                           value="<?php echo isset($_SESSION["lastName"]) ? $_SESSION["lastName"] : '';?>">
                                </label></td>
                        </tr>

                        <tr>
                            <td><label for="address1"> Address:</label></td>
                            <td><label>
                                    <input type="text" name="address1"
                                           value="<?php echo isset($_SESSION["address1"]) ? $_SESSION["address1"] : '';?>">
                                </label></td>
                        <tr>

                        <tr>
                           <td> <label for="address2"> Address (continued):</label></td>
                            <td><label>
                                    <input type="text" name="address2"
                                           value="<?php echo isset($_SESSION["address2"]) ? $_SESSION["address2"] : '';?>">
                                </label></td>
                        </tr>

                        <tr>
                            <td><label for="state">State:</label></td>
                            <td><label>
                                    <input type="text" name="state"
                                           value="<?php echo isset($_SESSION["state"]) ? $_SESSION["state"] : '';?>">
                                </label></td>
                        </tr>
                        <tr>
                            <td><label for="city">City:</label></td>
                            <td><label>
                                    <input type="text" name="city"
                                           value="<?php echo isset($_SESSION["city"]) ? $_SESSION["city"] : '';?>">
                                </label></td>
                        </tr>
                        <tr>
                            <td><label for="zipCode">Zip Code:</label></td>
                            <td><label>
                                    <input type="text" name="zipCode"
                                           value="<?php echo isset($_SESSION["zipCode"]) ? $_SESSION["zipCode"] : '';?>">
                                </label></td>
                        </tr>
                        <tr>
                            <th><h1>Room Information</h1></th>
                        </tr>

                        <tr>
                            <td><label for="bedType">Type of bed:</label></td>
                            <td><label>
                                    <select name="bedType">
                                        <option value="" <?php
                                        if (isset($_SESSION["bedType"]) && $_SESSION["bedType"]==""){
                                            echo "selected";} ?>>Select Bed</option>

                                        <option value="Standard Room Superior (2 Queen Beds)"<?php
                                        if (isset($_SESSION["bedType"]) && $_SESSION["bedType"]=="Standard Room Superior (2 Queen Beds)"){
                                            echo "selected";} ?>>Standard Room Superior (2 Queen Beds)</option>

                                        <option value="Standard Room Superior (1 King Bed)"<?php
                                        if (isset($_SESSION["bedType"]) && $_SESSION["bedType"]=="Standard Room Superior (1 King Bed)"){
                                            echo "selected";} ?>>Standard Room Superior (1 King Bed)</option>

                                        <option value="Suite (2 Queen Beds)"<?php
                                        if (isset($_SESSION["bedType"]) && $_SESSION["bedType"]=="Suite (2 Queen Beds)"){
                                            echo "selected";} ?>>Suite (2 Queen Beds)</option>

                                        <option value="Standard Room Deluxe (2 Queen Beds)"<?php
                                        if (isset($_SESSION["bedType"]) && $_SESSION["bedType"]=="Standard Room Deluxe (2 Queen Beds)"){
                                            echo "selected";} ?>>Standard Room Deluxe (2 Queen Beds)</option>

                                        <option value="Standard Room Deluxe (1 King Bed)"<?php
                                        if (isset($_SESSION["bedType"]) && $_SESSION["bedType"]=="Standard Room Deluxe (1 King Bed)"){
                                            echo "selected";} ?>>Standard Room Deluxe (1 King Bed)</option>

                                        <option value="Suite (1 King Bed)"<?php
                                        if (isset($_SESSION["bedType"]) && $_SESSION["bedType"]=="Suite (1 King Bed)"){
                                            echo "selected";} ?>>Suite (1 King Bed)</option>

                                    </select>
                                </label></td>
                        </tr>

                        <tr>
                            <td><label for="numberOfGuests">Number of Guests:</label></td>
                            <td><label>
                                <select name="numberOfGuests">
                                    <option value="" <?php
                                    if (isset($_SESSION["numberOfGuests"]) && $_SESSION["numberOfGuests"]==""){
                                        echo "selected";} ?>>Select Number Of Guests</option>

                                    <option value="1"<?php
                                    if (isset($_SESSION["numberOfGuests"]) && $_SESSION["numberOfGuests"]=="1"){
                                        echo "selected";} ?>>1</option>

                                    <option value="2"<?php
                                    if (isset($_SESSION["numberOfGuests"]) && $_SESSION["numberOfGuests"]=="2"){
                                        echo "selected";} ?>>2</option>

                                    <option value="3"<?php
                                    if (isset($_SESSION["numberOfGuests"]) && $_SESSION["numberOfGuests"]=="3"){
                                        echo "selected";} ?>>3</option>

                                    <option value="4"<?php
                                    if (isset($_SESSION["numberOfGuests"]) && $_SESSION["numberOfGuests"]=="4"){
                                        echo "selected";} ?>>4</option>
                                </select>
                            </label></td>
                        </tr>

                        <tr>
                            <td><label for="checkInDate">Check-in:</label></td>
                            <td><label>
                                    <input type="date" name="checkInDate"
                                           value="<?php echo isset($_SESSION["checkInDate"]) ? $_SESSION["checkInDate"] : '';?>">
                                </label></td>
                        </tr>

                        <tr>
                            <td><label for="checkOutDate">Check-out:</label></td>
                            <td><label>
                                    <input type="date" name="checkOutDate"
                                           value="<?php echo isset($_SESSION["checkOutDate"]) ? $_SESSION["checkOutDate"] : '';?>">
                                </label></td>
                        </tr>

                        <tr>
                            <td><label for="loyaltyMemberLabel">Loyalty Member:</label></td>
                            <td><label>
                                    <input type="text" name="loyaltyMemberLabel" value="<?php echo isset($_SESSION["loyaltyMemberLabel"]) ? $_SESSION["loyaltyMemberLabel"] : '';?>">
                                </label></td>
                        </tr>

                        <tr>
                            <td><label for="breakfast">Breakfast Included (Yes or No):</label></td>
                            <td><label>
                                    <select name="breakfast">
                                        <option value="" <?php
                                        if (isset($_SESSION["breakfast"]) && $_SESSION["breakfast"]==""){
                                            echo "selected";} ?>>Select A Choice</option>

                                        <option value="Yes"<?php
                                        if (isset($_SESSION["breakfast"]) && $_SESSION["breakfast"]=="Yes"){
                                            echo "selected";} ?>>Yes</option>

                                        <option value="No"<?php
                                        if (isset($_SESSION["breakfast"]) && $_SESSION["breakfast"]=="No"){
                                            echo "selected";} ?>>No</option>
                                    </select>
                                </label></td>
                        </tr>

                        <tr>
                            <td><label for="smokingOption">Smoking Option:</label></td>
                            <td><label>
                                    <select name="smokingOption">
                                        <option value="" <?php
                                        if (isset($_SESSION["smokingOption"]) && $_SESSION["smokingOption"]==""){
                                            echo "selected";} ?>>Select A Choice</option>

                                        <option value="Yes"<?php
                                        if (isset($_SESSION["smokingOption"]) && $_SESSION["smokingOption"]=="Yes"){
                                            echo "selected";} ?>>Yes</option>

                                        <option value="No"<?php
                                        if (isset($_SESSION["smokingOption"]) && $_SESSION["smokingOption"]=="No"){
                                            echo "selected";} ?>>No</option>
                                    </select>
                                </label></td>
                        </tr>



                        <tr>
                            <td><input id="submitButton" type="submit" name="submit" value="Submit"></td>
                        </tr>
                    </table>

            </form>
            </div>
        </section>
    </section>


    <?php
    include('footer.php');


    ?>
</main>

</body>
</html>

