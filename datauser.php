<?php
include('dbconnect.php');

$result = mysqli_query($k, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <table border="1">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
        <?php 
        while($row = mysqli_fetch_assoc($result))
         $i = 1;
        foreach($result as $value)
        {
        ?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $value['nama']?></td>
                <td><?php echo $value['username']?></td>
                <td><?php echo $value['email']?></td>
                <td><?php echo $value['active']==1?"Aktif":"Tidak aktif"?></td>
                <td><a href="edit.php?urut=<?php echo $value['id']?>">Update</a> | <a href="delete.php?urut=<?php echo $value['id']?>">Delete</a></td>
            </tr>
        <?php 
        $i++;
    }
    ?>
    </table>
    <a href="insert.php">Input New User</a>
</body>
</html>
