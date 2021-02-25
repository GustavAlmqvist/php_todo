<?php
$sysslor = []; //skapa tom array för att undvika "empty errors"
if (file_exists("attgöra.json")){
$json = file_get_contents("attgöra.json");
$sysslor = json_decode($json, true);
}
?>


<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Att-göra-lista</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="">
<body>

<!--Skapa nya sysslor -->
<form action="nysyssla.php" method="post">
  <input type="text" name="att_göra" placeholder="Skriv in sysslor">
  <button>Ny syssla</button>
<br>
<br>


<?php
foreach ($sysslor as $att_göra => $attgöra): ?>
<!--Checka av form-->
    <div style="margin-bottom: 10px;">
      <form style="display: inline-block" action="checkaav.php" method="post">
      <input type="hidden" name="todo" value="<?php echo $att_göra ?>">
      <input type="checkbox" <?php echo $attgöra["avklarad"] ? "checked" : ""?> >
      <?php echo $att_göra ?>
      </form>
<!--Ta bort form -->
      <form style="display: inline-block" action="tabort.php" method="post">
        <input type="hidden" name="todo" value="<?php echo $att_göra ?>">

        <button>Ta bort</button>
      </form>

    </div>

<?php endforeach; ?>

<!--avchecknings script -->

<script>
const checkboxes = document.querySelectorAll("input[type=checkbox]");
  checkboxes.forEach(ch => {
    ch.onclick = function () {
      this.parentNode.submit();
    };
  });
</script>

</body>
</html>
