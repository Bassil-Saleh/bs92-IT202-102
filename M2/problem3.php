<?php
$a1 = [-1, -2, -3, -4, -5, -6, -7, -8, -9, -10];
$a2 = [-1, 1, -2, 2, 3, -3, -4, 5];
$a3 = [-0.01, -0.0001, -.15];
$a4 = ["-1", "2", "-3", "4", "-5", "5", "-6", "6", "-7", "7"];

function bePositive($arr) {
    echo "<br>Processing Array:<br><pre>" . var_export($arr, true) . "</pre>";
    echo "<br>Positive output:<br>";
    //note: use the $arr variable, don't directly touch $a1-$a4
    //TODO use echo to output all of the values as positive (even if they were originally positive) and maintain the original datatype

    // Name: Bassil Saleh
    // UCID: bs92
    // Date: 2-16-2024
    foreach($arr as $i) {
        
        if((gettype($i) == "string") && ($i[0] == "-")) {
            // The order of these Boolean expressions is important.
            // If the element turns out to not be a string,  
            // then the second expression (and in turn this 
            // code block) will not execute.
            // This is because of short circuit evaluation;
            // if the first term in a Boolean AND expression
            // is false, then the entire expression will be 
            // false no matter what the other terms are.
            // This prevents PHP from attempting to extract 
            // a character from a non-string datatype.
            $i = str_replace("-","",$i);
        }
        elseif($i < 0) {
            // Multiplying a string containing a number
            // implicitly converts the final result 
            // to a number, so I put more than 
            // one conditional block to prevent this.
            $i *= -1;
        }
        //echo var_dump($i) . "<br>";   // For checking if the data type was preserved
        echo "$i<br>";
    }

    //hint: may want to use var_dump() or similar to show final data types
}
echo "Problem 3: Be Positive<br>";
?>
<table>
    <thread>
        <th>A1</th>
        <th>A2</th>
        <th>A3</th>
        <th>A4</th>
    </thread>
    <tbody>
        <tr>
            <td>
                <?php bePositive($a1); ?>
            </td>
            <td>
                <?php bePositive($a2); ?>
            </td>
            <td>
                <?php bePositive($a3); ?>
            </td>
            <td>
                <?php bePositive($a4); ?>
            </td>
        </tr>
</table>
<style>
    table {
        border-spacing: 2em 3em;
        border-collapse: separate;
    }

    td {
        border-right: solid 1px black;
        border-left: solid 1px black;
    }
</style>