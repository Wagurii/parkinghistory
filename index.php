<?php
 require_once ('connection.php');    

if(isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];   
} else {
    $page_no = 1;
}
// Total rows per record
$total_rows_per_record = 5;
// LIMIT offset
$offset = ($page_no - 1) * $total_rows_per_record;
// Previous page
$previous_page = $page_no - 1;
// Next page
$next_page = $page_no + 1;
// Total records
$result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM historytable");

$records = mysqli_fetch_array($result_count);
$total_records = $records['total_records'];

$total_no_of_pages = ceil($total_records / $total_rows_per_record);

$query = "SELECT * FROM historytable LIMIT $offset, $total_rows_per_record";
$result = mysqli_query($conn, $query);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>History</title>
</head>
<body>
    
<div class="history">
    <h1>Parking Records</h1>
    <table  >
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>    
                <th>Time in</th>
                <th>Time out</th>
                <th>Plate Number</th>
                <th>Total Fees</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
             // Check if records exist in the database
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['name']) . "</td>
                            <td>" . htmlspecialchars($row['age']) . "</td>
                            <td>" . htmlspecialchars($row['time_in']) . "</td>
                            <td>" . htmlspecialchars($row['time_out']) . "</td>
                            <td>" . htmlspecialchars($row['plate_number']) . "</td>
                            <td>" . htmlspecialchars($row['total_fees']) . "</td>
                            <td><button class='btn btn-danger delete-btn' data-id='" . $row['id'] . "'>Delete</button></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found.</td></tr>";
            }
        ?>
        </tbody>
    </table>
            
<nav aria-label="Page navigation example">
  <ul class="pagination">

    <li class="page-item <?= ($page_no <= 1) ? 'disabled' : ''; ?>">
      <a class="page-link" href="?page_no=<?= $previous_page; ?>">Previous</a>
    </li>
   <?php
      for ($i = 1; $i <= $total_no_of_pages; $i++) {
        echo "<li class='page-item " . ($page_no == $i ? "active" : "") . "'><a class='page-link' href='?page_no=$i'>$i</a></li>";
      }
    ?>
    <li class="page-item <?= ($page_no >= $total_no_of_pages) ? 'disabled' : ''; ?>">
      <a class="page-link" href="?page_no=<?= $next_page; ?>">Next</a>
    </li>
  </ul>
</nav>
<div class="pages">
    <strong>Page <?=$page_no;?></strong>
</div>
</div>

<!-- Bootstrap Modal for confirmation -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
        <a href="#" id="deleteLink" class="btn btn-danger">Yes, Delete</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const recordId = this.getAttribute('data-id'); 
            const deleteUrl = `/phm/delete.php?deleteid=${recordId}`;
            document.getElementById('deleteLink').setAttribute('href', deleteUrl);
            
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            modal.show();
        });
    });
</script>

</body>
</html>
