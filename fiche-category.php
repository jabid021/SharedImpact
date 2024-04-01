<link rel="stylesheet" href="back-office.css">

<nav id="navigation-left">
  <a href="">Categories</a>
  <a href="">Initiatives</a>
  <a href="">Foundation</a>
  <a href="">People</a>
  <a href="">News</a>
</nav>


<select id="selectCategory">
  <option value="1">Education</option>
  <option value="2">Employment</option>
  <option value="3">Health/Mental Health</option>
</select>


<form action="post.php" method="POST">
  <input type="text" placeholder="CATEGORY TITLE">
  <textarea placeholder="Paste Lobby categoru text here"></textarea>
  <input type="submit" value="SAVE >">
</form>
