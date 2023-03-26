
<form method="GET">
    <label for="dob">Enter your date of birth (YYYY-MM-DD):</label>
    <input type="text" name="dob" id="dob">
    <button type="submit">Calculate</button>
</form>

<?php
if(isset($_GET['dob'])) {
    $dob = $_GET['dob'];
    $day_of_week = date('l', strtotime($dob));              
    $age = date_diff(date_create($dob), date_create('now'))->y;
    $next_birthday = date('Y') . '-' . date('m-d', strtotime($dob));
    if($next_birthday < date('Y-m-d')) {
        $next_birthday = (date('Y')+1) . '-' . date('m-d', strtotime($dob));
    }
    $days_until_next_birthday = date_diff(date_create($next_birthday), date_create('now'))->days;
    echo '<p>Your birthday is on a ' . $day_of_week . '</p>';
    echo '<p>You are ' . $age . ' years old</p>';
    echo '<p>There are ' . $days_until_next_birthday . ' days until your next birthday</p>';
}
?>

