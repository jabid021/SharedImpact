<?php
include("bdd_connexion.php");
$listCategories = doSQL("SELECT category_id,category_title from category",array());

$categorySelected = doSQL("SELECT * from category where category_id=:category_id",array(":category_id"=>$_GET["id"]));
$category_id=$categorySelected[0]["category_id"];
$category_title=$categorySelected[0]["category_title"];
$category_text=$categorySelected[0]["category_text"];
?>

<?php
include("header.php");
echo "<main>";
include("navbar.php");
?>

<style>

form>div:nth-of-type(1)
{
  width:200px;
}

form>div:nth-of-type(1) input
{
  width:200px;
}
</style>
<div id="content-margin-left" style="width:14%;"></div>
<div id="content-center">

  <div>
    <div class="input-tooltip" >SELECT A CATEGORY</div>
    <div>
      <select id="selectElement">
        <?php
        foreach ($listCategories as $row) {
          echo "<option value='".$row["category_id"]."'>".$row["category_title"]."</option>";
        }
        ?>
      </select>
    </div>
  </div>
  <form action="post.php" method="POST">
    <input type="hidden" name="action" value="update-category">
    <input type="hidden" name="category_id" value="<?php echo $category_id;?>">
    <div>
      <div class="input-tooltip">NEW TITLE</div>
      <div> <input required  type="text"  name="category_title" class="black-btn-confirm" placeholder="CATEGORY TITLE" <?php echo "value='".$category_title."'"; ?>></div>
    </div>
    <div>
      <div class="input-tooltip tooltip-double"><div>UPLOAD LOBBY CATEGORY TEXT</div><div>Maximum 500 letters</div></div>
      <div>
        <textarea maxlength="500" rows="10" id="category-textarea" name="category_text"  placeholder="Paste Lobby category text here"><?php echo $category_text; ?></textarea>
      </div>
    </div>
    <div class="div-btn"><input class="btn-submit" type="submit" value="Save >"></div>
  </form>
</div>

</main>


<script>

navbarMenu1.classList.add("btn-active");
navbarMenu1.classList.remove("btn-navbar");


var idCategory = <?php echo $_GET["id"];?>;
selectElement.value=idCategory;
selectElement.onchange = function()
{
  idCategory = selectElement.value;
  location.href= (location.protocol + '//' + location.host + location.pathname+"?id="+idCategory);

};
</script>
