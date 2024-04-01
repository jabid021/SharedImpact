<?php
include("header.php");
echo "<main>";
include("navbar.php");
?>

<div id="content-left">
  <input type="button" class="btn-blue-advice" value="Create a new Category >">

  <form action="post.php" method="POST">
    <input type="hidden" action="add-category">
    <div class="div-form">
      <div class="input-tooltip">NEW CATEGORY</div>
      <input align="right" type="text"  name="category" class="black-btn-confirm" placeholder="CATEGORY TITLE">
    </div>
    <div align="right"><input class="btn-submit" type="submit" value="Save >"></div>
  </form>
</div>

<div id="content-right">
  <input type="button" class="btn-blue-advice" value="Select a Category >">
  <div class="div-form">
    <div class="input-tooltip">UPDATE A CATEGORY</div>
    <select id="selectCategory">
      <option value="1">Education</option>
      <option value="2">Employment</option>
      <option value="3">Health/Mental Health</option>
    </select>
  </div>

  <div id="btn-row">
    <input onclick="redirectCateg('update')" id="update-category" class="btn-submit" type="button" value="Modify category"><input class="btn-submit" id="delete-category" onclick="redirectCateg('delete')" type="button" value="Delete category">
  </div>

  </div>
</main>

<script>

navbarMenu1.classList.add("btn-active");
navbarMenu1.classList.remove("btn-navbar");
function redirectCateg(mode)
{
  var idCategory =  selectCategory.value;
  var optionCategory = selectCategory.selectedOptions[0].text;
  if(mode=="update")
  {
    location.href=`fiche-category.php?id=${idCategory}`;
  }
  else
  {
    if(confirm(`Delete category ${optionCategory} ?`))
    {
      location.href=`post.php?action=delete-category&id=${idCategory}`;
    }
  }
}

</script>
