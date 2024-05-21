<?php
if (!isset($_SESSION)) {
    session_start();
}
define('TITLE', 'Official Message');
define('PAGE', 'testimonies');
include('./partials/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/config/db_connection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}

// Pagination variables
$records_per_page = 5;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if (!is_numeric($current_page) || $current_page < 1) {
    // Invalid page number, redirect to the first page
    header("Location: testimonies.php?page=1");
    exit();
}

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $records_per_page;

// Prepare and execute the SQL query with pagination
$sql = "SELECT * FROM testimony LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $offset, $records_per_page);
$stmt->execute();
$result = $stmt->get_result();

?>

<div class="col-sm-9 mt-5">
    <?php if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    } ?>
    <!--Table-->
    <p class=" bg-dark text-white p-2">List of Official Messages</p>
    <?php
    if ($result->num_rows > 0) {
        echo '<table class="table">
       <thead>
        <tr>
         <th scope="col">ID</th>
         <th scope="col">Name</th>
         <th scope="col">Description</th>
         <th scope="col">Action</th>
        </tr>
       </thead>
       <tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<th scope="row">' . $row["id"] . '</th>';
            echo '<td>' . $row["name"] . '</td>';
            echo '<td>' . substr($row['description'], 0, 40) . '...</td>';
            echo '<td><form action="edit_testimony.php" method="POST" class="d-inline"> <input type="hidden" name="id" value=' . $row["id"] . '><button type="submit" class="btn btn-info mr-3" name="view" value="View"><i class="fas fa-pen"></i></button></form>
          <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value=' . $row["id"] . '><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
         </tr>';
        }

        echo '</tbody>
        </table>';
        $sql = "SELECT COUNT(*) AS total_records FROM testimony";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $total_records = $row['total_records'];
        $total_pages = ceil($total_records / $records_per_page);

        // Calculate the range of pages to display
        $range = 2; // Number of pages to display before and after the current page

        // Determine the start and end page numbers
        $start = max(1, $current_page - $range);
        $end = min($total_pages, $current_page + $range);


        // Display pagination links
        echo '<nav aria-label="Cadets Page Navigation"><ul class="pagination justify-content-end mt-5">';

        // Display the "First" page link
        if ($current_page > 1 && $current_page - 1 >= 2) {
            echo '<li class="page-item"><a class="page-link" href="?page=1">First</a></li>';
        }

        // Display page numbers within the range
        for ($i = $start; $i <= $end; $i++) {
            echo '<li class="page-item ' . ($i == $current_page ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
        }

        // Display the "Last" page link
        // if ($current_page < $total_pages && !($end - $current_page < 2)) {
        //     echo '<li class="page-item"><a class="page-link" href="?page=' . $total_pages . '">Last</a></li>';
        // }
        if ($current_page < $total_pages && !($end - $current_page < 2)) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . $total_pages . '">Last</a></li>';
        }

        echo '</ul></nav>';
    } else {
        echo "No Official Message Found";
    }
    if (isset($_REQUEST['delete'])) {
        $sql = "DELETE FROM testimony WHERE id = {$_REQUEST['id']}";
        if ($conn->query($sql) === TRUE) {

            echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        } else {
            echo "Unable to Delete Data";
        }
    }
    ?>
</div>
</div> <!-- div Row close from header -->
<div><a class="btn btn-danger box" href="./add_testimony.php"><i class="fas fa-plus fa-2x"></i></a></div>
</div> <!-- div Conatiner-fluid close from header -->
<?php
include('./partials/footer.php');
?>
