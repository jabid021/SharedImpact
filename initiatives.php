<?php
include("bdd_connexion.php");
$listInitiatives = doSQL("SELECT initiative_id,initiative_name from initiative");
?>

<?php
include("header.php");
echo "<main>";
include("navbar.php");
?>

<div id="content-left">
  <input type="button" class="btn-blue-advice" value="Create a new Initiative ▷">

  <form action="post.php" method="POST">
    <input type="hidden" name="action" value="add-initiative">
    <div class="div-form">
      <div class="input-tooltip">NEW INITIATIVE</div>
      <input align="right" type="text"  name="initiative_name" class="black-btn-confirm" placeholder="INITIATIVE NAME">
    </div>
    <div align="right"><input class="btn-submit" type="submit" value="Save ▷"></div>
  </form>
</div>

<div id="content-right">
  <input type="button" class="btn-blue-advice" value="Select an Initiative ▷">
  <div class="div-form">
    <div class="input-tooltip">UPDATE AN INITIATIVE</div>
    <select id="selectElement">
      <?php
      foreach ($listInitiatives as $row) {
        echo "<option value='".$row["initiative_id"]."'>".$row["initiative_name"]."</option>";
      }
      ?>
    </select>
  </div>

  <div id="btn-row">
    <input onclick="redirectElement('update')"  class="btn-submit" type="button" value="Modify initiative"><input class="btn-submit" onclick="redirectElement('delete')" type="button" value="Delete initiative">
  </div>

</div>
</main>

<script>

navbarMenu2.classList.add("btn-active");
navbarMenu2.classList.remove("btn-navbar");
function redirectElement(mode)
{
  var idElement =  selectElement.value;
  var optionElement = selectElement.selectedOptions[0].text;
  if(mode=="update")
  {
    location.href=`initiative-form-name.php?id=${idElement}`;
  }
  else
  {
    if(confirm(`Delete category ${optionElement} ?`))
    {
      location.href=`post.php?action=delete-initiative&initiative_id=${idElement}`;
    }
  }
}

</script>
