<?php 

include('./includes/dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Debugging: Output POST data
    // echo '<pre>';
    // print_r($_POST);  // This will print the POST array with all form values
    // echo '</pre>';
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $rooms = $_POST['rooms'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $remark = $_POST['remark'];
    $dest_id = $_POST['dest_id'];
    $hotel_id = $_POST['hotel_id'];

    $sql = "INSERT INTO booking (name, email, contact, adults, children, rooms, check_in, check_out, remark, dest_id, hotel_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare the statement
    if ($stmt = $mysqli->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("sssiiisssii", $name, $email, $contact, $adults, $children, $rooms, $check_in, $check_out, $remark, $dest_id, $hotel_id);

        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Booking successful!')</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the query: " . $mysqli->error;
    }
}
?>



<form style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;" method="post">
    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Your Name</label>
        <input style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 3px;" id="name" type="text" name="name" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">E-mail</label>
        <input style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 3px;" id="email" type="email" name="email" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="contact" style="display: block; margin-bottom: 5px; font-weight: bold;">Contact Number</label>
        <input style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 3px;" id="contact" type="tel" name="contact" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="check_in" style="display: block; margin-bottom: 5px; font-weight: bold;">Check-in Date</label>
        <input style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 3px;" id="check_in" type="date" name="check_in" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="check_out" style="display: block; margin-bottom: 5px; font-weight: bold;">Check-out Date</label>
        <input style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 3px;" id="check_out" type="date" name="check_out" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="adults" style="display: block; margin-bottom: 5px; font-weight: bold;">Adults</label>
        <input style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 3px;" id="adults" type="number" name="adults" min="1" value="1" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="children" style="display: block; margin-bottom: 5px; font-weight: bold;">Children</label>
        <input style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 3px;" id="children" type="number" name="children" min="0" value="0">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="rooms" style="display: block; margin-bottom: 5px; font-weight: bold;">Number of Rooms</label>
        <input style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 3px;" id="rooms" type="number" name="rooms" min="1" value="1" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label for="remark" style="display: block; margin-bottom: 5px; font-weight: bold;">Anything Else?</label>
        <textarea style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 3px; resize: vertical;" id="remark" name="remark" ></textarea>
    </div>

    <div style="margin-bottom: 15px;">
    <input type="hidden" name="dest_id" value="<?php echo isset($_GET['dest_id']) ? htmlspecialchars($_GET['dest_id']) : ''; ?>">
    <input type="hidden" name="hotel_id" value="<?php echo isset($_GET['hotel_id']) ? htmlspecialchars($_GET['hotel_id']) : ''; ?>">
        <button style="width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 3px; cursor: pointer;" type="submit">Submit Your Review</button>
    </div>
</form>
