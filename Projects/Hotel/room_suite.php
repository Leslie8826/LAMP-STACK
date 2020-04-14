<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Sweet Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="Home Sweeet Home - Rooms & Suites">
    <meta name="author" content="Leslie Nertomb">
    <link rel="stylesheet" href="css/room_suite.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
include('header.php');
session_start();
?>

<section>
    <div class="roomSuite_containter">
        <div class="roomSuite">
            <h1> STANDARD ROOM WITH TWO QUEEN-SIZED BEDs - SUPERIOR</h1>
            <img src ="images/queenSized_Superior.jpg" alt="Queen-sized bedroom">
            <h2> Enjoy a Quiet Night Sleep in our Standard Room with 2 Queen-Sized Beds</h2>
            <p> Guest room is approximately 115 square feet and has two queen-sized beds.  Room has a flat screen
                TV, clock radio, private bath with shower/tub combination, C.O. Bigelow bath amenities. WiFi available
                for free in lobby and for a surcharge in guest rooms. Maximum occupancy is two (4) persons. </p>
            <div class="bookingButton_room"><a href="reservation.php">BOOK NOW</a></div>
        </div>

        <div class="roomSuite">
            <H1> STANDARD ROOM WITH KING-SIZED BED - SUPERIOR </H1>
            <img src ="images/kingSized_Superior.jpg" alt="King-sized bedroom">
            <h2> Rest & Relax in this Warm, Quiet Room in New York City </h2>
            <p> Guest room is approximately 120 square feet and has one (1) king bed.  Room has a flat screen TV,
                clock radio, private bath with shower/tub combination, C.O. Bigelow bath amenities. WiFi available
                for free in lobby and for a surcharge in guest rooms. Maximum occupancy is two ( 2 )persons. </p>
            <div class="bookingButton_room"><a href="reservation.php">BOOK NOW</a></div>
        </div>

        <div class="roomSuite">
            <h1> SUITE WITH TWO QUEEN-SIZED BED </h1>
            <img src ="images/suiteQueen_sup.jpg" alt="Queen-sized bedroom">
            <p> This spacious floor plan is outfitted with 2 queen-sized bed, sleeper sofa, microwave / refrigerator
                combos, and large flat-screen televisions. Full private bathrooms accompany each suite and adjoining
                rooms are available upon request.</p>
            <div class="bookingButton_room"><a href="reservation.php">BOOK NOW</a></div>
        </div>

        <div class="roomSuite">
            <h1> STANDARD ROOM WITH TWO QUEEN-SIZED BEDS - DELUXE</h1>
            <img src ="images/queenSized_deluxe.jpg" alt="Queen-sized bedroom">
            <p> Guest room is approximately 135 square feet and has two (2) double sized beds.  Room has a flat
                screen TV, clock radio, private bath with shower/tub combination, C.O. Bigelow bath amenities.
                WiFi available for free in lobby and for a surcharge in guest rooms. Maximum occupancy is three (3)
                adults or three (3) adults and one (1)child under 12 years of age.</p>
            <div class="bookingButton_room"><a href="reservation.php">BOOK NOW</a></div>
        </div>

        <div class="roomSuite">
            <H1> STANDARD ROOM WITH KING-SIZED BED - DELUXE </H1>
            <img src ="images/kingSized_deluxe.jpg" alt="King-sized bedroom">
            <p> Guest room is approximately 140 square feet and has one (1) king sized bed. Room has a flat screen TV,
                clock radio, private bath with shower/tub combination, and New York City’s C.O. Bigelow bath amenities.
                WiFi available for free in lobby and for a surcharge in guest rooms. Maximum occupancy is two (2)
                persons. </p>
            <div class="bookingButton_room"><a href="reservation.php">BOOK NOW</a></div>
        </div>

        <div class="roomSuite">
            <H1> SUITE WITH KING-SIZED BED </H1>
            <img src ="images/suiteKing_deluxe.jpg" alt="King-sized bedroom">
            <p>Private bedroom has bathroom with Neutrogena amenities, a kitchen with full size refrigerator, a dining
                area off the kitchen, a flexible workspace, a separate living area with sleeper sofa and 2 TVs</p>
            <div class="bookingButton_room"><a href="reservation.php">BOOK NOW</a></div>
        </div>
    </div>

</section>

<?php
include('footer.php');

/* Destroys all sessions from reservation and confirmation pages*/
/* Allows to reset session variables once we go on that page */
session_destroy();
?>

</body>
</html>
