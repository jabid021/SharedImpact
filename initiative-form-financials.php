<?php
include("header.php");
echo "<main>";
include("navbar.php");
?>

<style>
#initiative-navbar
{
  width:20%;
  display:flex;
  flex-direction: column;
  margin-left: 3vw;
  margin-top:35px;

}
#selectInitiative
{
  width:195px;
  height:35px;
  margin-bottom:15px;
}
#form-navbar{width:35%;}

navigation .btn-navbar
{
  background-color: #d5d5d5;
}
</style>



<?php include("initiativeNavBar.php")?>
<div id="form-navbar"><div>


</main>

<script>

initiativeNavBar4.classList.add("btn-active");
initiativeNavBar4.classList.remove("btn-navbar");

</script>
