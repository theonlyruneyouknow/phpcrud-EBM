<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the contact ID exists
if (isset($_GET['companionship_id'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM companionship WHERE companionship_id = ?');
    $stmt->execute([$_GET['companionship_id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that companionship_id!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM companionship WHERE companionship_id = ?');
            $stmt->execute([$_GET['companionship_id']]);
            $msg = 'You have deleted the contact!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No companionship_id specified!');
}
?>

<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete Contact #<?=$contact['companionship_id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete contact #<?=$contact['companionship_id']?>?</p>
    <div class="yesno">
        <a href="delete.php?companionship_id=<?=$contact['companionship_id']?>&confirm=yes">Yes</a>
        <a href="delete.php?companionship_id=<?=$contact['companionship_id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>
