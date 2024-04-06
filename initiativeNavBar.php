<?php
include("bdd_connexion.php");
$listInitiatives = doSQL("SELECT initiative_id,initiative_name from initiative");
?>

<div id="initiative-navbar">
  <select id="selectInitiative">
    <?php
    foreach ($listInitiatives as $row) {
      echo "<option value='".$row["initiative_id"]."'>".$row["initiative_name"]."</option>";
    }
    ?>
  </select>

  <navigation style="height:100%">
    <a id="initiativeNavBar1" class="btn btn-navbar" href="initiative-form-name.php?id=<?php echo $_GET["id"]?>">Name</a>
    <a id="initiativeNavBar2" class="btn btn-navbar" href="initiative-form-about.php?id=<?php echo $_GET["id"]?>">About</a>
    <a id="initiativeNavBar3" class="btn btn-navbar" href="initiative-form-summary.php?id=<?php echo $_GET["id"]?>">Summary</a>
    <a id="initiativeNavBar4" class="btn btn-navbar" href="initiative-form-financials.php?id=<?php echo $_GET["id"]?>">Financials</a>
    <a id="initiativeNavBar5" class="btn btn-navbar" href="initiative-form-kpis.php?id=<?php echo $_GET["id"]?>">KPIs</a>
    <a id="initiativeNavBar6" class="btn btn-navbar" href="initiative-form-review.php?id=<?php echo $_GET["id"]?>">Review</a>
    <a id="initiativeNavBar7" class="btn btn-navbar" href="initiative-form-fundedby.php?id=<?php echo $_GET["id"]?>">Funded by</a>
  </navigation>
</div>


<script>

navbarMenu2.classList.add("btn-active");
navbarMenu2.classList.remove("btn-navbar");

var idInitiative = <?php echo $_GET["id"];?>;
selectInitiative.value=idInitiative;
selectInitiative.onchange = function()
{
  idInitiative = selectInitiative.value;
  location.href= (location.protocol + '//' + location.host + location.pathname+"?id="+idInitiative);

};
</script>
