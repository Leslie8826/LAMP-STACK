<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Sweet Home - Welcome</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="Home Sweeet Home Welcome Page">
    <meta name="author" content="Leslie Nertomb">
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
<?php
include('header.php')
?>

<section>
    <div class="body">
        <div id="menuLeft">
            <div id="menuButton1"><a href="aboutus.php">About us</a></div>
            <div id="menuButton2"><a href="room_suite.php">Rooms & Suites</a></div>
            <div id="menuButton3"><a href="#">Specials</a></div>
            <div id="menuButton4"><a href="faq.php">FAQ</a></div>
            <div id="menuButton5"><a href="#">Contact</a></div>
        </div>

        <div id="menuRight">
            <a href="#"><img src ="images/hSh_welcome_page.jpg" alt="Home Sweet Home Main Picture" class="responsive-image"></a>
            <h1>Welcome To Home Sweet Home Hotel</h1>
            <p>Stay in the heart of the Mid-Town Center of New York. We're mere steps from New York Family-Friendly
                attractions like Broadway shows and Madame Tussaud, and near subway stations that take you anywhere
                in the city.</p>
            <p>Our welcoming environment complemented by spacious rooms and modern amenities mirror the city's
                best midtown hotels, but at an affordable price.</p>
            <p>Ideal for value-minded business and non-business travelers who want to feel like home. Our rooms
                and suites boast ultra-clean an home styled settings you'll love.</p>
        </div>
    </div>
</section>

<?php
include('footer.php')
?>
</body>
</html>
