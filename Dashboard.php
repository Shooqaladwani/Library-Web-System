<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Project CSS -->
    <link rel="stylesheet" href="project/css/styles.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #503a1d;
            margin: 0;
            padding: 0;
        }

        .content {
            padding: 120px 20px;
        }

        .page-title {
            font-size: 2.5em;
            color:rgb(249, 231, 197);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            margin-bottom: 10px;
            text-align: center;
        }

        .page-description {
            font-size: 1.2em;
            color: white;
            margin-bottom: 20px;
            text-align: center;
        }

        table img {
            width: 100px;
            height: auto;
            border-radius: 10px;
        }

        .table {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <img src="project/books/Logo.png" alt="Public Library">
        <nav class="navigation">
            <ul>
                <li><a href="Home.html">Home</a></li>
                <li><a href="Books.html">Books</a></li>
                <li><a href="Contact Us.html">Contact Us</a></li>
                <li><a href="Dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="content">
        <h1 class="page-title">Dashboard - BookFlow</h1>
        <p class="page-description">This page contains a list of all books available in the database.</p>

        <table class="table table-dark table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Book</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "library";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM books";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["book_id"] . "</td>";
                        echo "<td>" . $row["book_name"] . "</td>";
                        echo "<td>" . $row["book_author"] . "</td>";
                        echo "<td>" . $row["book_description"] . "</td>";
                        echo "<td><img src='" . $row["book_img"] . "' alt='Book Image'></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No results found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 BookFlow. All rights reserved.</p>
    </footer>

</body>

</html>