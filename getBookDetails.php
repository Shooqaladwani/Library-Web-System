
    <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die(json_encode(["error" => "Database connection failed."]));
    }

    // Check if book_id is provided
    if (isset($_GET['book_id'])) {
        $book_id = intval($_GET['book_id']);

        // Query to fetch book details
        $sql = "SELECT book_author, book_description FROM books WHERE book_id = $book_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo json_encode($result->fetch_assoc());
        } else {
            echo json_encode(["error" => "No details found for this book."]);
        }
    } else {
        echo json_encode(["error" => "No book_id provided."]);
    }

    // Close connection
    $conn->close();
    ?>
