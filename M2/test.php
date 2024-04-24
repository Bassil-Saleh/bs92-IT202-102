<?php
require(__DIR__ . "/partials/nav.php");
?>
<?php if (isset($_GET['carid'])) : ?>
    <h1>
        <?php echo $_GET['carid'] ?>
    </h1>
<?php else : ?>

<h2>Cars</h2>

<form>
    <div class="one_line_field">
        <label for="make">Make</label>
        <input class="one_line_textfield" type="text" name="make" required />
    </div>
    <div class="one_line_field">
        <label for="model">Model</label>
        <input class="one_line_textfield" type="text" name="model" required />
    </div>
    <div class="one_line_field">
        <label for="year">Year</label>
        <input class="one_line_textfield" type="text" name="year" required />
    </div>
    <input class="submit_button" type="submit" value="Add Car" />
</form>
<table>
    <tr>
        <th>Make</th>
        <th>Model</th>
        <th>Year</th>
    </tr>
    <?php
    $db = getDB();
    $stmt = $db->prepare("SELECT make, model, year FROM Cars");
    try {
        $result = $stmt->execute();
        if ($result) {
            //echo "<table>";
            $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
            //echo var_dump($records) . "<br>";
            foreach($records as $car) {
                echo "<tr>";
                echo "<td>" . $car['make'] . "</td>";
                echo "<td>" . $car['model'] . "</td>";
                echo "<td>" . $car['year'] . "</td>";
                echo "</tr>";
            }
            //echo "</table>";
        }
    } catch (Exception $e) {
        echo var_dump($e);
    }
    if (isset($_GET['make']) && isset($_GET['model']) && isset($_GET['year'])) {
        $make = $_GET['make'];
        $model = $_GET['model'];
        $year = $_GET['year'];
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Cars (make, model, year) VALUES(:make, :model, :year)");
        try {
            $stmt->execute(["make" => $make, "model" => $model, "year" => $year]);
            echo "Car inserted.";
        } catch (Exception $e) {
            echo "There was a problem inserting your car into the table.";
            echo "<pre>" . var_export($e, true) . "</pre>";
            //flash("There was a problem inserting your car into the table.", "warning");
        }
        //echo $_GET['make'] . " " . $_GET['model'] . " " . $_GET['year'];
    }
    ?>
</table>
<?php endif;?>
<?php
/*$db = getDB();
$stmt = $db->prepare("SELECT make, model, year FROM Cars");
try {
    $result = $stmt->execute();
    if ($result) {
        echo "<table>";
        $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        //echo var_dump($records) . "<br>";
        foreach($records as $car) {
            echo "<tr>";
            echo "<td>" . $car['make'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
} catch (Exception $e) {
    echo var_dump($e);
}*/
?>