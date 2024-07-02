<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['companionship_id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $companionship_id = isset($_POST['companionship_id']) ? $_POST['companionship_id'] : NULL;
        $area_id = isset($_POST['area_id']) ? $_POST['area_id'] : '';
        $real_comp = isset($_POST['real_comp']) ? $_POST['real_comp'] : '';
        $rm1_id = isset($_POST['rm1_id']) ? $_POST['rm1_id'] : '';
        $rm2_id = isset($_POST['rm2_id']) ? $_POST['rm2_id'] : '';
        // $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        // $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        // Update the record
        $stmt = $pdo->prepare('UPDATE companionship SET companionship_id = ?, area_id = ?, real_comp = ?, rm1_id = ?, rm2_id = ? WHERE companionship_id = ?');
        // $stmt = $pdo->prepare('UPDATE companionship SET companionship_id = ?, name = ?, email = ?, phone = ?, title = ?, created = ? WHERE companionship_id = ?');
        // $stmt->execute([$companionship_id, $area_id, $real_comp, $rm1_id, $rm2_id, $_GET['companionship_id']]);
        $stmt->execute([$companionship_id, $area_id, $real_comp, $rm1_id, $rm2_id, $_GET['companionship_id']]);
        // $stmt->execute([$id, $name, $email, $phone, $title, $created, $_GET['companionship_id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM companionship WHERE companionship_id = ?');
    $stmt->execute([$_GET['companionship_id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        template_header('Find');
         exit('Contact doesn\'t exist with that companionship_id!');
        
    }
} else {
     template_header('Find');
}
?>

     <table>
    <thead>
            <tr>
                <td>#</td>
                <td>companionship_id</td>
                <!-- <td>Area_id</td>
                <td>real_comp</td>
                <td>rm1_id</td>
                <td>rm2_id</td> -->
                <td></td>
            </tr>
        </thead>
        <tbody>
        <tr>
                < !-- <td>#</td> 
                <td><input type="text" name="companionship_id" placeholder="1" value="<?=$contact['companionship_id']?>" id="companionship_id">
        </td>
                <!-- <td> <input type="text" name="area_id" placeholder="area_id" value="< ?=$contact['area_id']?>" id="area_id">
        </td>
                <td><input type="text" name="real_comp" placeholder="real comp" value="< ?=$contact['real_comp']?>" id="real_comp"></td>
                <td><input type="text" name="rm1_id" placeholder="rm1_id" value="< ?=$contact['rm1_id']?>" id="rm1_id">
        </td>
                <td><input type="text" name="rm2_id" placeholder="rm2_id" value="< ?=$contact['rm2_id']?>" id="rm2_id">
       </td> -- >
       <input type="datetime-local" name="created" value="< ?=date('Y-m-d\TH:i', strtotime($contact['created']))?>" id="created"> -->
        <input type="submit" value="Find">
                <td></td>
            </tr>
</tbody>
</table>
<?
    exit('No companionship_id specified!');

   
// }
?>
<!-- 
< ?=template_header('Read')?>

<div class="content update">
	<h2>Update Contact #< ?=$contact['companionship_id']?></h2>
    <form action="update_template.php?companionship_id=<?=$contact['companionship_id']?>" method="post">
    <table>
    <thead>
            <tr>
                < !-- <td>#</td> - ->
                <td>companionship_id</td>
                <td>Area_id</td>
                <td>real_comp</td>
                <td>rm1_id</td>
                <td>rm2_id</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
        <tr>
                <!-- <td>#</td> -- >
                <td><input type="text" name="companionship_id" placeholder="1" value="< ?=$contact['companionship_id']?>" id="companionship_id">
        </td>
                <td> <input type="text" name="area_id" placeholder="area_id" value="< ?=$contact['area_id']?>" id="area_id">
        </td>
                <td><input type="text" name="real_comp" placeholder="real comp" value="< ?=$contact['real_comp']?>" id="real_comp"></td>
                <td><input type="text" name="rm1_id" placeholder="rm1_id" value="< ?=$contact['rm1_id']?>" id="rm1_id">
        </td>
                <td><input type="text" name="rm2_id" placeholder="rm2_id" value="< ?=$contact['rm2_id']?>" id="rm2_id">
       </td>
                <td></td>
            </tr>
</tbody>
</table>
        <!-- <label for="companionship_id">ID</label>
        <label for="name">companionship_id</label>
       <input type="text" name="companionship_id" placeholder="1" value="< ?=$contact['companionship_id']?>" id="companionship_id">
       <label for="email">area_id</label>
        <label for="phone">real_comp</label>
        
        <input type="text" name="rm1_id" placeholder="2025550143" value="< ?=$contact['rm1_id']?>" id="rm1_id">
        <label for="title">rm1_id</label>
        <label for="created">rm2_id</label>
        <input type="text" name="rm2_id" placeholder="Employee" value="< ?=$contact['rm2_id']?>" id="rm2_id"> -->
        <!-- <input type="datetime-local" name="created" value="< ?=date('Y-m-d\TH:i', strtotime($contact['created']))?>" id="created"> -- >
        <input type="submit" value="Update"> 
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?> -->
