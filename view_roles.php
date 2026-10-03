<?php
include 'db.php';

// Fetch all roles
$sql = "SELECT * FROM user_roles ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Roles</title>
  <link rel="stylesheet" href="style_roles_view.css">
</head>
<body>
  <div class="container">
    <h1>👥 All User Roles</h1>
    <a href="add_role.html" class="btn-add">+ Add New Role</a>
    
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>Role Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['role_name'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>" . $row['created_at'] . "</td>
                    <td>
                      <a href='edit_role.php?id=" . $row['id'] . "'>Edit</a> | 
                      <a href='delete_role.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No roles found.</p>";
    }
    $conn->close();
    ?>
  </div>
</body>
</html>
