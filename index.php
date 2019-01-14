<?php

class Interview
{
    public $title = 'Interview test';
}

$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';

$people = array(
    array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
    array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
    array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
    array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
    array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

$person = $_POST['person'];
//Need to instantiate the Interview class
$interview = new Interview();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Interview test</title>
    <style>
        body {font: normal 14px/1.5 sans-serif;}
    </style>
</head>
<body>
<!-- Directly reference instantiated class -->
<h1><?php echo $interview->title; ?></h1>

<?php
// Print 10 times
//Fixed to count properly
for ($i = 0; $i < 10; $i++)
{
    echo '<p>' . $lipsum . '</p>';
}
?>


<hr>


<form method="get" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
    <p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
    <p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
    <p><input type="submit" value="Submit" /></p>
</form>
<!-- Directly reference input to get data, remove short open codes -->
<?php if ($_GET['person']): ?>
    <p><strong>Person</strong> <?php echo $_GET['person']['first_name']; ?>, <?php echo $_GET['person']['last_name']; ?>, <?php echo $_GET['person']['email']; ?></p>
<?php endif; ?>

<hr>


<table>
    <thead>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($people as $person): ?>
        <!-- Reference array properly as $person is not an object -->
        <tr>
            <td><?php echo $person['first_name']; ?></td>
            <td><?php echo $person['last_name']; ?></td>
            <td><?php echo $person['email']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>