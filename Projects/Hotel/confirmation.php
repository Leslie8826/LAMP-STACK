
<!doctype html>
<html lang="en">
<head>
    <title>Home Sweet Home - Confirmation</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/confirmation.css"/>
</head>
<body>
<?php
include('header.php')
?>

<main>
    <section id="section1">
        <?php
         session_start();
        $previous_page = $_SESSION['current_page'];

        if ($_SESSION["errors"] == 0){
           echo "<h1>Thank you for your room reservation</h1>";
           echo "<p> An email was sent to you to confirm your order </p></br><p>See you soon </p>";
        } else {
            echo "<h1>There are some errors on your information</h1>";
            echo "<p> Please go back to the reservation page to correct your errors </p><br><p>See you soon </p>";
            echo "<div class='goBack'><a href=".$previous_page.">GO BACK</a></div>";
        } ?>
    </section>

    <section id="section2">
        <!-- Version avec SESSION-->
    <?php
    echo " <h1>Your summary: </h1><br>";

    if ($_SESSION["errors"] <> 0) {
        echo "number of errors = " . $_SESSION["errors"] . "<br>";
    } else {
        echo "number of errors = None <br>";
    }

    /* DISPLAY FIRST NAME AND ERROR MESSAGE IF ANY FOR FIRST NAME */
    echo " First Name: ".$_SESSION["firstName"];
    echo $_SESSION["firstNameErr"]."<br>";

    /* DISPLAY LAST NAME AND ERROR MESSAGE IF ANY FOR LAST NAME */
    echo " Last Name: ".$_SESSION["lastName"];
    echo $_SESSION["lastNameErr"]."<br>";

    /* DISPLAY ADDRESS1 AND ERROR MESSAGE IF ANY FOR ADDRESS1 */
    echo "Address: ".$_SESSION["address1"];
    echo $_SESSION["address1Err"]."<br>";

    /* DISPLAY ADDRESS2 */
    echo " Address (continued): ".$_SESSION["address2"]."<br>";

    /* DISPLAY STATE */
    echo " State: ".$_SESSION["state"]."<br>";

    /* DISPLAY CITY */
    echo " City: ".$_SESSION["city"]."<br>";

    /* DISPLAY ZIP CODE */
    echo "Zip Code: ".$_SESSION["zipCode"];
    echo $_SESSION["zipCodeErr"]."<br>";


    echo "<br> <h1>Your reservation Preferences:</h1> <br>";


    /* DISPLAY BED TYPE AND ERROR IF ANY */
    echo "Bed Type: ".$_SESSION["bedType"];
    echo $_SESSION["bedTypeErr"]."<br>";


    /* DISPLAY NUMBER OF GUESTS AND ERROR IF ANY */
    echo "Number of guests: ".$_SESSION["numberOfGuests"];

    if ($_SESSION["numberOfGuests"] == "") {
        echo $_SESSION["numberOfGuestsErr"];
    }elseif (!($_SESSION["numberOfGuests"] == "")){
        echo $_SESSION["numberOfGuestsErr_sup2q"];
        echo $_SESSION["numberOfGuestsErr_sup1k"];
        echo $_SESSION["numberOfGuestsErr_del2q"];
        echo $_SESSION["numberOfGuestsErr_del1k"];
        echo $_SESSION["numberOfGuestsErr_s2q"];
        echo $_SESSION["numberOfGuestsErr_s1k"]."<br>";
    }


    /* DISPLAY CHECKIN DATE AND ERROR IF ANY */
    echo "Check-in date: ".$_SESSION["checkInDate"];
    echo $_SESSION["checkInDateErr"]."<br>";

    /* DISPLAY CHECKOUT DATE AND ERROR IF ANY */
    echo "Check-out date: ".$_SESSION["checkOutDate"]."<br>";
    echo $_SESSION["checkOutDateErr"]."<br>";

    /* DISPLAY LOYALTY MEMBER AND ERROR IF ANY */
    echo "Loyalty Member: ".$_SESSION["loyaltyMemberLabel"];
    echo $_SESSION["loyaltyMemberErr"]."<br>";


    /* DISPLAY BREAKFAST AND ERROR IF ANY */
    echo "Breakfast: " . $_SESSION["breakfast"];
    echo $_SESSION["breakfastErr"]."<br>";

    /* DISPLAY SMOKING OPTION AND ERROR IF ANY */
    echo "Smoking option: " . $_SESSION["smokingOption"];
    echo $_SESSION["smokingOptionErr"]."<br>";


/* IF NO ERRORS, WE PRINT THE DETAILS OF THE RESERVATION */
    if($_SESSION["errors"] == 0) {
        /* Room cost*/
        $roomPrice1 = 250;
        $roomPrice2 = 350;
        $roomPrice3 = 500;
        echo "<br><h1>The information of your stay is below:</h1><br>";

        /* Length of stay */
        $datetime1 = date_create($_SESSION["checkInDate"]);
        $datetime2 = date_create($_SESSION["checkOutDate"]);

        $diff = date_diff($datetime1, $datetime2);
        echo "<br> Length of stay: " . $diff->format('%d days');

        /* Total cost of stay */

        $totalCostStay = $roomPrice1 * ($diff->format('%d days'));
        echo "The total cost of stay: $" . $totalCostStay;

        /* Breakfast or not?*/
        if ($_SESSION["breakfast"] == "Yes") {
            echo "<br> Breakfast included";
        } elseif ($_SESSION["breakfast"] == 'No') {
            echo "<br> Breakfast not included";
        }

        /* Breakfast cost per person */
        if ($_SESSION["breakfast"] == 'Yes') {
            if ($_SESSION["loyaltyMemberLabel"] == 'gold' || $_SESSION["loyaltyMemberLabel"] == 'silver') {
                $breakfastCost = 0;
                echo "<br> As a " . $_SESSION["loyaltyMemberLabel"] . " member, breakfast is free";
            } else {
                $breakfastCost = 20;
                echo "<br> Breakfast is $" . $breakfastCost . "/person";
            }
        }

        /* Total breakfast cast */
        $totalBreakfast = $_SESSION["numberOfGuests"] * $breakfastCost;
        echo "<br> Total breakfast cast: " . $totalBreakfast;

        /* Total cost of reservation*/
        $totalReservation = $totalCostStay + $totalBreakfast;
        echo "<br> Your reservation is " . $totalReservation;

        /* Reservation number*/
        echo "Your reservation number: ";

    }elseif(!($_SESSION["errors"] == 0)){
        echo "";
    }
    ?>


    </section>
<section id="section3">
    <p><a href='welcome.php' class='commandButton'>Return to Home</a></p>
</section>

    <?php
    unset($_SESSION["errors"]);
    include('footer.php')
    ?>

    <?php exit();?>
</main>


</body>
</html>


