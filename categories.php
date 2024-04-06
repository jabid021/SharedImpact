<?php
include("bdd_connexion.php");
$listCategories = doSQL("SELECT category_id,category_title from category");
?>
<?php
include("header.php");
echo "<main>";
include("navbar.php");
?>

<div id="content-left">
  <input type="button" class="btn-blue-advice" value="Create a new Category ▷">

  <form action="post.php" method="POST">
    <input type="hidden" name="action" value="add-category">
    <div class="div-form">
      <div class="input-tooltip">NEW CATEGORY</div>
      <input required align="right" type="text"  name="category-title" class="black-btn-confirm" placeholder="CATEGORY TITLE">
    </div>
    <div align="right"><input class="btn-submit" type="submit" value="Save ▷"></div>
  </form>
</div>

<div id="content-right">
  <input type="button" class="btn-blue-advice" value="Select a Category ▷">
  <div class="div-form">
    <div class="input-tooltip">UPDATE A CATEGORY</div>
    <select id="selectElement">
      <?php
      foreach ($listCategories as $row) {
        echo "<option value='".$row["category_id"]."'>".$row["category_title"]."</option>";
      }
      ?>
    </select>
  </div>

  <div id="btn-row">
    <input onclick="redirectElement('update')"  class="btn-submit" type="button" value="Modify category"><input class="btn-submit" onclick="redirectElement('delete')" type="button" value="Delete category">
  </div>

</div>
</main>

<script>

navbarMenu1.classList.add("btn-active");
navbarMenu1.classList.remove("btn-navbar");
function redirectElement(mode)
{
  var idElement =  selectElement.value;
  var optionElement = selectElement.selectedOptions[0].text;
  if(mode=="update")
  {
    location.href=`category-form.php?id=${idElement}`;
  }
  else
  {
    if(confirm(`Delete category ${optionElement} ?`))
    {
      location.href=`post.php?action=delete-category&category_id=${idElement}`;
    }
  }
}

</script>
