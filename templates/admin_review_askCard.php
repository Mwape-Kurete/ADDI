<?php
require '../includes/db.php'; // Include your database connection


// Fetch pending asks along with the name of the user who posted it  username
$sql_asks = "SELECT a.*, u.username 
             FROM ask a 
             JOIN users u ON a.user_id = u.user_id 
             WHERE a.approved = 0";
$result_asks = $conn->query($sql_asks);
?>

<!--START OF Admin Review Card-->
<!--ask cards-->

<?php while ($ask = $result_asks->fetch_assoc()): ?>
    <div class="col asks-for-approval">
        <div class="col-12 ask-card">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($ask['title']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($ask['details']); ?></p>
                    <div class="row lower-half">
                        <div class="col-11 meta-info">
                            <a href="#" class="card-link posted-by">@<span><?php echo htmlspecialchars(($ask['username'])) ?></span></a>
                            <small class="card-link date-time-asks">@<span class="time-asks"><?php echo htmlspecialchars(($ask['creation'])) ?></span></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr id="dotted-div">
        <div class="col-12 d-flex justify-contnet-start align-items-center buttons">
            <form method="POST" action="/ADDI/templates/approved.php" class="approved-denied-btns me-2">
                <input type="hidden" name="AK_id" value="<?php echo $ask['ask_id']; ?>">
                <button type="submit" name="action" value="approve" class="btn btn-primary btn-yes">Approve</button>
            </form>
            <form method="POST" action="/ADDI/templates/denied.php" class="approved-denied-btns">
                <input type="hidden" name="ask_id" value="<?php echo $ask['ask_id']; ?>">
                <button type="submit" name="action" value="deny" class="btn btn-primary btn-no">Deny</button>
            </form>
        </div>
    </div>
<?php endwhile; ?>

<!--END OF Admin Review Card-->