<?php
$title = "Edit Facility";
include('db_connect.inc');
include('header.inc');
include('nav.inc');



if (!empty($_GET['facilityid'])) {
  $id = $_GET['facilityid'];
  $sql = "select * from facilities where facilityid=?";
  $stmt = $conn->prepare($sql);
  if (!$stmt) {
      exit("prepare failed: " . $conn->error);
  }
  $stmt->bind_param("i", $id); 
  $stmt->execute();
  $records = $stmt->get_result();
  foreach ($records as $row) {
  
?>
    <div class="text-start">
     <h1>Edit facility</h1>
     </div>
     <form action="edit_process.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="facilityid" value="<?php echo $row['facilityid']; ?>">
    
            <div class="mb-3 mt-3">
                <label for="facname" class="form-label">Facilities Name:</label>
                <input type="text" class="form-control" id="facname" placeholder="Provide a name for the facility" name="facname" required value="<?php echo $row['facilityname']; ?>">
            </div>
 
            <div class="mb-3 mt-3">
                <label for="Des" class="form-label">Description:</label>
                <textarea class="form-control" id="Des" placeholder="Describe the facility briefly" name="Des" required><?php echo $row['description']; ?></textarea>
            </div>


    
    <div class="file-upload">
     <label for="chfile" class="required-label">Select an Image:</label><br>
      <INPUT Class="file-input" type="file" id="chfile" name="chfile">
        <span><?php echo $row['image']; ?></span>
        <p class="max-image-size">Max image size 500px</p>
  </div>

           <div class="mb-3 mt-3">
                <label for="ImCa" class="form-label">Image Caption:</label>
                <input type="text" class="form-control" id="ImCa" placeholder="Describe the image in one word" name="ImCa" required value="<?php echo $row['caption']; ?>">
            </div>
   
 
            <div class="mb-3 mt-3">
                <label for="CaP" class="form-label">Capacity:</label>
                <input type="text" class="form-control" id="CaP" placeholder="A max number of people" name="CaP" value="<?php echo $row['capacity']; ?>">
            </div>


             <div class="mb-3 mt-3">
                <label for="Pr" class="form-label">Price:</label>
                <input type="text" class="form-control" id="Pr" placeholder="$0.00" name="Pr" value="<?php echo $row['price']; ?>">
            </div>

    <div class="mb-3 mt-3">
    <label for="bedconf" class="form-label required-label">Bed configuration:</label>
    <select class="form-select fac-inputb" id="bedconf" name="bedconf" required>
    <option value="" disabled selected>✓ --Choose an option--</option>
        <?php
        $configurations = [
            "Single" => "2 Single",
            "Double" => "1 Double",
            "Queen" => "1 Queen",
            "King" => "1 King",
            "N/A" => "N/A",
        ];

        foreach ($configurations as $value => $label) {
            $selected = ($row['configuration'] === $value) ? "selected" : "";
            echo "<option value='$value' $selected>$label</option>";
        }
        ?>
    </select>
</div>




    <div class="form-buttons">
    <button type="submit" class="submit-button">
        <i class="material-symbols-outlined">check</i> submit
    </button>
    <button type="reset" class="clear-button">
        <i class="material-symbols-outlined">close</i> Clear
    </button>
</div>
   
</form>
<?php
    }
}
include('footer.inc');
?>