<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['companionship_id']) && !empty($_POST['companionship_id']) && $_POST['companionship_id'] != 'auto' ? $_POST['companionship_id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $name = isset($_POST['area_id']) ? $_POST['area_id'] : '';
    $email = isset($_POST['real_comp']) ? $_POST['real_comp'] : '';
    $phone = isset($_POST['rm1_id']) ? $_POST['rm1_id'] : '';
    $title = isset($_POST['rm2_id']) ? $_POST['rm2_id'] : '';
    // $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO companionship VALUES (?, ?, ?, ?, ?, ?)');
    // $stmt = $pdo->prepare('INSERT INTO companionship VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $name, $email, $phone, $title]);
    // $stmt->execute([$id, $name, $email, $phone, $title, $created]);
    // Output message
    $msg = 'Created Successfully!';
}
?>

<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
        <label for="companionship_id">companionship_id</label>
        <label for="name">Name</label>
        <input type="text" name="companionship_id" placeholder="26" value="auto" id="companionship_id">
        <input type="text" name="name" placeholder="John Doe" id="name">
        <label for="email">Email</label>
        <label for="phone">Phone</label>
        <input type="text" name="email" placeholder="johndoe@example.com" id="email">
        <input type="text" name="phone" placeholder="2025550143" id="phone">
        <label for="title">Title</label>
        <label for="created">Created</label>
        <input type="text" name="title" placeholder="Employee" id="title">
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>

