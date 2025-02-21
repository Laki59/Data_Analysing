<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "lol") or die("Couldn't connect");

// Check if the form is submitted
if (isset($_POST['Search'])) {
    $name = $_POST['name'];  // Capture input value

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM mytable WHERE FIELD1 = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();

    // Fetch results
    $result = $stmt->get_result();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh; 
            background-color: gray;
        }

        
        .table-container {
            margin-top: 20px; 
            text-align: center;
            width: 80%; 
        }

        
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px; 
        }

        input {
            padding: 10px;
            font-size: 16px;
        }

        input[type="text"] {
        padding: 10px;
         border: 2px solid #ccc;
        border-radius: 10px; 
        outline: none;
        width: 250px;
        font-size: 16px;
        }

        input[type="submit"] {
        padding: 10px 15px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 10px; 
        cursor: pointer;
        font-size: 16px;
        margin-left: 10px;
        }


input[type="submit"]:hover {
    background-color: #0056b3;
}

        
        table {
    width: 80%;
    border-collapse: collapse;
    border-radius: 12px; 
    overflow: hidden; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
        th, td {
            border: 1px solid black;
            padding: 10px;
            background-color: #f4f4f4;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Centered Inputs -->
        <form action="index.php" method="POST">
            <input type="text" id="name" name="name" placeholder="Enter Name" required>
            <input type="submit" value="Search" name="Search">
        </form>
    <?php if (isset($result) && $result->num_rows > 0): ?>
        <h2>Search Results</h2>
        <table border="1">
            <tr>
                <th>API Name</th>
                <th>Title</th>
                <th>Difficulty</th>
                <th>Hero Type</th>
                <th>Alt Type</th>
                <th>Resource</th>
                <th>HP Base</th>
                <th>HP per Level</th>
                <th>Armor Base</th>
                <th>Armor per Level</th>
                <th>Magic Resist Base</th>
                <th>Magic Resist per Level</th>
                <th>Range Type</th>
                <th>Date</th>
                <th>Role</th>
                <th>Client Positions</th>
                <th>External Positions</th>
                <th>Fullname</th>
                <th>Nickname</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <?php 
                    // Convert single quotes to double quotes before decoding
                    $jsonString = str_replace("'", '"', $row['stats']);
                    $stats = json_decode($jsonString, true);
                    
                ?>
                <tr>
                    <td><?= htmlspecialchars($row['apiname']) ?></td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['difficulty']) ?></td>
                    <td><?= htmlspecialchars($row['herotype']) ?></td>
                    <td><?= htmlspecialchars($row['alttype']) ?></td>
                    <td><?= htmlspecialchars($row['resource']) ?></td>
                    <td><?= isset($stats['hp_base']) ? $stats['hp_base'] : 'N/A' ?></td>
                    <td><?= isset($stats['hp_lvl']) ? $stats['hp_lvl'] : 'N/A' ?></td>
                    <td><?= isset($stats['arm_base']) ? $stats['arm_base'] : 'N/A' ?></td>
                    <td><?= isset($stats['arm_lvl']) ? $stats['arm_lvl'] : 'N/A' ?></td>
                    <td><?= isset($stats['mr_base']) ? $stats['mr_base'] : 'N/A' ?></td>
                    <td><?= isset($stats['mr_lvl']) ? $stats['mr_lvl'] : 'N/A' ?></td>
                    <td><?= htmlspecialchars($row['rangetype']) ?></td>
                    <td><?= htmlspecialchars($row['date']) ?></td>
                    <td><?= htmlspecialchars($row['role']) ?></td>
                    <td><?= htmlspecialchars($row['client_positions']) ?></td>
                    <td><?= htmlspecialchars($row['external_positions']) ?></td>
                    <td><?= htmlspecialchars($row['fullname']) ?></td>
                    <td><?= htmlspecialchars($row['nickname']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php elseif (isset($result)): ?>
        <p>No results found for "<strong><?= htmlspecialchars($name) ?></strong>".</p>
    <?php endif; ?>
    </div>
</body>
</html>
