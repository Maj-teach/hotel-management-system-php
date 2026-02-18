<?php
$title = "Add More";
include('db_connect.inc');
include('header.inc');
include('nav.inc');
?>

<main id="add-background">
    <div class="content-container">
        <section>
            <div class="text-center">
                <h1 class="add-h1">Add a facility</h1>
            </div>
            <div class="text-center"> 
                <p id="add-p">You can add a new facility here</p>
            </div>
        </section>

        <form action="process_add.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="facname" class="form-label">Facilities Name:</label>
                <input type="text" class="form-control" id="facname" placeholder="Provide a name for the facility" name="facname" required>
            </div>

            <div class="mb-3 mt-3">
                <label for="Des" class="form-label">Description:</label>
                <textarea class="form-control" id="Des" placeholder="Describe the facility briefly" name="Des" required></textarea>
            </div>

            <div class="file-upload">
                <label for="chfile" class="required-label">Select an Image:</label>
                <input class="file-input" type="file" id="chfile" name="chfile" required>
                <p class="max-image-size">Max image size 500px</p>
            </div>

            <div class="mb-3 mt-3">
                <label for="ImCa" class="form-label">Image Caption:</label>
                <input type="text" class="form-control" id="ImCa" placeholder="Describe the image in one word" name="ImCa" required>
            </div>

            <div class="mb-3 mt-3">
                <label for="CaP" class="form-label">Capacity:</label>
                <input type="text" class="form-control" id="CaP" placeholder="A max number of people" name="CaP">
            </div>

            <div class="mb-3 mt-3">
                <label for="Pr" class="form-label">Price:</label>
                <input type="text" class="form-control" id="Pr" placeholder="$0.00" name="Pr">
            </div>

            <div class="mb-3 mt-3">
                <label for="bedconf" class="form-label required-label">Bed configuration:</label>
                <select class="form-select fac-inputb" id="bedconf" name="bedconf" required>
                <option value="" disabled selected>✓ --Choose an option--</option>
                    <option value="Single">2 Single</option>
                    <option value="Double">1 Double</option>
                    <option value="Queen">1 Queen</option>
                    <option value="King">1 King</option>
                    <option value="N/A">N/A</option>
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
    </div>
</main>

<?php
include('footer.inc');
?>
