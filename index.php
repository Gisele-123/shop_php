<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <title>PHP CRUD SHOP</title>
</head>
<body>
    <div class='container my-5'>
         <h2>List Of Clients.</h2>
         <a href='/phpShop/create.php' class='btn btn-primary' role='button'>New client</a><br><br>
         <table class='table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- ... -->
<tbody>
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'shop';

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }
    $sql = 'SELECT * FROM clients';
    $result = $connection->query($sql);
    if (!$result) {
        die('Invalid query: ' . $connection->error);
    };
    while ($row = $result->fetch_assoc()) {
        echo "
          <tr>
            <td>" . (isset($row['id']) ? $row['id'] : '') . "</td>
            <td>" . (isset($row['name']) ? $row['name'] : '') . "</td>
            <td>" . (isset($row['email']) ? $row['email'] : '') . "</td>
            <td>" . (isset($row['phone']) ? $row['phone'] : '') . "</td>
            <td>" . (isset($row['address']) ? $row['address'] : '') . "</td>
            <td>" . (isset($row['created_at']) ? $row['created_at'] : '') . "</td>
            <td>
                <a href='/phpShop/edit.php?id=" . (isset($row['id']) ? $row['id'] : '') . "' class='btn btn-primary'>Edit</a>
                <a href='/phpShop/delete.php?id=" . (isset($row['id']) ? $row['id'] : '') . "' class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        ";
    };
    ?>
</tbody>
<!-- ... -->

         </table>

         <a href='/hwshop/export.php' class='btn btn-primary' role='button'>Data Export</a><br><br>
    </div>
</body>
</html>