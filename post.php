<?php
include("bdd_connexion.php");
$domaine="http://localhost/SharedImpact/";

if(isset($_POST["action"])){

  if($_POST["action"]=="add-category")
  {
    $params = array(':category_title' => $_POST["category-title"]);
    $idCategory = doUpdate("INSERT INTO category (category_title) VALUES (:category_title)",$params);
    header('Location: '.$domaine."/category-form.php?id=".$idCategory);
  }

  if($_POST["action"]=="update-category")
  {
    $params = array(':category_id' => $_POST["category_id"],':category_title' => $_POST["category_title"],':category_text' => $_POST["category_text"]);
    doUpdate("UPDATE category set category_title= :category_title, category_text=:category_text where category_id=:category_id",$params);
    header('Location: '.$domaine."/categories.php");
  }




  if($_POST["action"]=="add-initiative")
  {
    $params = array(':initiative_name' => $_POST["initiative_name"]);
    $idInitiative = doUpdate("INSERT INTO initiative (initiative_name) VALUES (:initiative_name)",$params);
    header('Location: '.$domaine."/initiative-form-name.php?id=".$idInitiative);
  }

  if($_POST["action"]=="update-initiative-name")
  {
    $params = array(':initiative_id' => $_POST["initiative_id"],':initiative_name' => $_POST["initiative_name"]);
    doUpdate("UPDATE initiative set initiative_name= :initiative_name where initiative_id=:initiative_id",$params);
    header('Location: '.$domaine."/initiative-form-name.php?id=".$_POST["initiative_id"]);
  }

}
else if(isset($_GET["action"]))
{
  if($_GET["action"]=="delete-category")
  {
    $params = array(':category_id' => $_GET["category_id"]);
    doUpdate("DELETE from category where category_id = :category_id",$params);
    header('Location: '.$domaine."/categories.php");
  }

  if($_GET["action"]=="delete-initiative")
  {
    $params = array(':initiative_id' => $_GET["initiative_id"]);
    doUpdate("DELETE from initiative where initiative_id = :initiative_id",$params);
    header('Location: '.$domaine."/initiatives.php");
  }
}

?>
