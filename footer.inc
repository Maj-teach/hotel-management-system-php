<footer>
    <div class="text-center">
        <?php
        $usernameQuery = "SELECT DISTINCT username FROM facilities";
        $usernameResult = $conn->query($usernameQuery);

        if ($usernameResult->num_rows > 0) {
            echo "<div class='username-list'>";
            while ($row = $usernameResult->fetch_assoc()) {
                $username = $row['username'];
                $link = "user.php?username=$username";
                echo "<a href='$link'>$username</a><span class='username-space'>&nbsp;&nbsp;</span>";
            }
            echo "</div>";
        }
        $conn->close();
        ?>
        <span>© Copyright S3942494-Majid Nurahmed. All rights reserved │ Designed for International Melbourne Hotel</span>
    </div>
</footer>
</body>
</html>
