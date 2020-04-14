<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Sweet Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="Home Sweeet Home About Us Page">
    <meta name="author" content="Leslie Nertomb">
    <link rel="stylesheet" href="css/room_suite.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
include('header.php')
?>
<section>
    <!-- DB TEST -->
<p> DB TEST </p>
    /*<?php
    $db = new mysqli('127.0.0.1', 'root', 'MySQL_021282', 'hotel');
    $query = "SELECT loyaltyMemberId, loyaltyMemberLabel FROM loyalty_member";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    /*$loyaltyMember = $result->fetch_all(MYSQLI_ASSOC);*/
    $loyaltyMember= $result->fetch_row();

    while($loyaltyMember = $result->fetch_assoc()){
        echo "loyalty id: " . $loyaltyMember["loyaltyMemberId"]. " - loyalty member Name: " . $loyaltyMember["loyaltyMemberLabel"]."<br>";
    }
?>*/

<?php
    echo "<br>";
    $_POST['loyaltyMemberLabel'] = 'gold';

    $mysqli = new mysqli('127.0.0.1', 'root', 'MySQL_021282', 'hotel');
    $stmt = $mysqli->prepare("SELECT * FROM loyalty_member WHERE loyaltyMemberLabel = ?");
    $stmt->bind_param("s", $_POST['loyaltyMemberLabel']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No rows');
    while($row = $result->fetch_assoc()) {
    $ids[] = $row['loyaltyMemberId'];
    $labels[] = $row['loyaltyMemberLabel'];
    }

    var_export($labels);

    echo "<br> $labels[0]";
    $stmt->close();
    echo "<br>";
?>




    <?php
    /* Search for bed label in bed_type table*/
    /* Label of BedType = 1 */
    $db = new mysqli('127.0.0.1', 'root', 'MySQL_021282', 'hotel');
    $query1 = "SELECT bedTypeName from bed_type where bedTypeId=1";
    $stmt1 = $db->prepare($query1);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    //$l = $result->fetch_all(MYSQLI_ASSOC);
    $bedName1= $result1->fetch_row();

    /* Label of BedType = 2 */
    $db = new mysqli('127.0.0.1', 'root', 'MySQL_021282', 'hotel');
    $query2 = "SELECT bedTypeName from bed_type where bedTypeId=2";
    $stmt2 = $db->prepare($query2);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    //$l = $result->fetch_all(MYSQLI_ASSOC);
    $bedName2= $result2->fetch_row();

    /* Label of BedType = 3 */
    $db = new mysqli('127.0.0.1', 'root', 'MySQL_021282', 'hotel');
    $query3 = "SELECT bedTypeName from bed_type where bedTypeId=3";
    $stmt3 = $db->prepare($query3);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    //$l = $result->fetch_all(MYSQLI_ASSOC);
    $bedName3= $result3->fetch_row();

    /* Label of BedType = 3 */
    $db = new mysqli('127.0.0.1', 'root', 'MySQL_021282', 'hotel');
    $query4 = "SELECT bedTypeName from bed_type where bedTypeId=4";
    $stmt4 = $db->prepare($query4);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    //$l = $result->fetch_all(MYSQLI_ASSOC);
    $bedName4= $result4->fetch_row();



    /* bedTypeId=1*/
    $db = new mysqli('127.0.0.1', 'root', 'MySQL_021282', 'hotel');
    $query_1 = "SELECT count(roomId) as n from room where bedTypeId=1";
    $stmt_1 = $db->prepare($query_1);
    $stmt_1->execute();
    $result_1 = $stmt_1->get_result();
    //$l = $result->fetch_all(MYSQLI_ASSOC);
    $roomAvailable_1= $result_1->fetch_row();

    /* bedTypeId=2*/
    $db = new mysqli('127.0.0.1', 'root', 'MySQL_021282', 'hotel');
    $query_2 = "SELECT count(roomId) as n from room where bedTypeId=2";
    $stmt_2 = $db->prepare($query_2);
    $stmt_2->execute();
    $result_2 = $stmt_2->get_result();
    //$l = $result->fetch_all(MYSQLI_ASSOC);
    $roomAvailable_2= $result_2->fetch_row();


    /* bedTypeId=3*/
    $db = new mysqli('127.0.0.1', 'root', 'MySQL_021282', 'hotel');
    $query_3 = "SELECT count(roomId) as n from room where bedTypeId=3";
    $stmt_3 = $db->prepare($query_3);
    $stmt_3->execute();
    $result_3 = $stmt_3->get_result();
    //$l = $result->fetch_all(MYSQLI_ASSOC);
    $roomAvailable_3= $result_3->fetch_row();

    /* bedTypeId=4*/
    $db = new mysqli('127.0.0.1', 'root', 'MySQL_021282', 'hotel');
    $query_4 = "SELECT count(roomId) as n from room where bedTypeId=3";
    $stmt_4 = $db->prepare($query_4);
    $stmt_4->execute();
    $result_4 = $stmt_4->get_result();
    //$l = $result->fetch_all(MYSQLI_ASSOC);
    $roomAvailable_4= $result_4->fetch_row();


    echo "<br>";
    echo "Bed type: ".$bedName1[0]."\t";
    echo "Number of rooms available: ".$roomAvailable_1[0];
    ?>


<?php
date_default_timezone_set("America/New_York");
echo "<br> Today is:";
$today = date("m/d/y");
echo $today;?>


<?php
echo "<br> Day of week: ";
$dayOfWeek = date("w", strtotime($today));
$day = date("l", strtotime($today));
echo $dayOfWeek;
echo "<br>";
echo $day;?>


<!--
/* Print next week starting from today: */
/*echo "Print the days of next week";
$startDate = strtotime("Monday");
$endDate = strtotime("+1 week", $startDate);

while ($startDate < $endDate){
    echo date("F d Y", $startDate)."<br>";
    $startDate = strtotime("+1 day", $startDate);
}
?>-->

    <?php
    $startDate = strtotime("Monday");
    $endDate = strtotime("+1 week", $startDate);
    ?>

    <p>Availability of rooms</p>
    <table>
        <tr>
            <?php
                echo "<th>".date("F d Y", $startDate)." </th>";
                $startDate = strtotime("+1 day", $startDate);
            echo "<th>".date("F d Y", $startDate)." </th>";
            $startDate = strtotime("+1 day", $startDate);

            echo "<th>".date("F d Y", $startDate)." </th>";
            $startDate = strtotime("+1 day", $startDate);

            echo "<th>".date("F d Y", $startDate)." </th>";
            $startDate = strtotime("+1 day", $startDate);

            echo "<th>".date("F d Y", $startDate)." </th>";
            $startDate = strtotime("+1 day", $startDate);

            echo "<th>".date("F d Y", $startDate)." </th>";
            $startDate = strtotime("+1 day", $startDate);

            echo "<th>".date("F d Y", $startDate)." </th>";
            $startDate = strtotime("+1 day", $startDate);
            ?>
        </tr>
        <tr>
            <td> <?php echo $roomAvailable_1[0]." room(s) (".$bedName1[0].") available";?>
                <br> <?php echo $roomAvailable_2[0]." room(s) (".$bedName2[0].") available";?>
                <br> <?php echo $roomAvailable_3[0]." room(s) (".$bedName3[0].") available";?>
                <br> <?php echo $roomAvailable_4[0]." room(s) (".$bedName4[0].") available";?>
            </td>
        </tr>
        <tr>
            <td> <?php echo $roomAvailable_1[0]." room(s) (".$bedName1[0].") available";?>
                <br> <?php echo $roomAvailable_2[0]." room(s) (".$bedName2[0].") available";?>
                <br> <?php echo $roomAvailable_3[0]." room(s) (".$bedName3[0].") available";?>
                <br> <?php echo $roomAvailable_4[0]." room(s) (".$bedName4[0].") available";?>
            </td>
        </tr>
        <tr>
            <td> <?php echo $roomAvailable_1[0]." room(s) (".$bedName1[0].") available";?>
                <br> <?php echo $roomAvailable_2[0]." room(s) (".$bedName2[0].") available";?>
                <br> <?php echo $roomAvailable_3[0]." room(s) (".$bedName3[0].") available";?>
                <br> <?php echo $roomAvailable_4[0]." room(s) (".$bedName4[0].") available";?>
            </td>
        </tr>
        <tr>
            <td> <?php echo $roomAvailable_1[0]." room(s) (".$bedName1[0].") available";?>
                <br> <?php echo $roomAvailable_2[0]." room(s) (".$bedName2[0].") available";?>
                <br> <?php echo $roomAvailable_3[0]." room(s) (".$bedName3[0].") available";?>
                <br> <?php echo $roomAvailable_4[0]." room(s) (".$bedName4[0].") available";?>
            </td>
        </tr>
        <tr>
            <td> <?php echo $roomAvailable_1[0]." room(s) (".$bedName1[0].") available";?>
                <br> <?php echo $roomAvailable_2[0]." room(s) (".$bedName2[0].") available";?>
                <br> <?php echo $roomAvailable_3[0]." room(s) (".$bedName3[0].") available";?>
                <br> <?php echo $roomAvailable_4[0]." room(s) (".$bedName4[0].") available";?>
            </td>
        </tr>
        <tr>
            <td> <?php echo $roomAvailable_1[0]." room(s) (".$bedName1[0].") available";?>
                <br> <?php echo $roomAvailable_2[0]." room(s) (".$bedName2[0].") available";?>
                <br> <?php echo $roomAvailable_3[0]." room(s) (".$bedName3[0].") available";?>
                <br> <?php echo $roomAvailable_4[0]." room(s) (".$bedName4[0].") available";?>
            </td>
        </tr>
        <tr>
            <td> <?php echo $roomAvailable_1[0]." room(s) (".$bedName1[0].") available";?>
                <br> <?php echo $roomAvailable_2[0]." room(s) (".$bedName2[0].") available";?>
                <br> <?php echo $roomAvailable_3[0]." room(s) (".$bedName3[0].") available";?>
                <br> <?php echo $roomAvailable_4[0]." room(s) (".$bedName4[0].") available";?>
            </td>
        </tr>

    </table>

</section>

<?php
include('footer.php')
?>

</body>
</html>
