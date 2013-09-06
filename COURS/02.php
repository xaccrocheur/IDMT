<h1>CSS - Le style</h1>
<h2 id="main">Définition d'une feuille de style</h2>

<p>Les <a href="http://fr.wikipedia.org/wiki/Cascading_Style_Sheets">Cascading
    Style Sheets</a> permettent la séparation du contenu (le texte,
  les images, etc.) et du contenant (la page elle-même et <a href="./?cours=01">ses élément structurels</a>).
</p>

<hr />

<h2>Les sélecteurs</h2>
<p>Une page web est un ensemble de tags, aussi appelés balises, ou encore conteneurs, qui définissent les propriétés des éléments (texte, image, video, etc.) qu'il contiennent. La page elle-même est contenue dans le tag <a class="tagref">html</a>.

</p>

<pre class="code" title="css">
body {
  background-color:#fbfaf8;
  margin:20px;
  padding:0px;
  font:1em/1.3em verdana, arial, helvetica, sans-serif;
}
  
div.liste {
  margin: 0 0 .3em 0;
}
  
h2 {
  margin: 0 0 .3em 0;
}
  
h3 {
  margin: 0 0 .3em 0;
}
  
p {
  margin: 0 0 0 .5em;
}
</pre>

<h3>Les classes</h3>
<p>le tag <span class="tag">&lt;a&gt;</span>.
</p>

<h3>Les IDs</h3>
<p>le tag <span class="tag">&lt;a&gt;</span>.
</p>

<pre class="code" title="css">
  
h2 {
  margin: 0 0 .3em 0;
}

</pre>


<div id="liens">
  <h2>Liens</h2>
  <ul>
    <li><a href="http://www.w3.org/TR/html4/index/elements.html">Liste
        complète des tags HTML 4 / XHTML 1</a></li>
    <li><a href="http://debray.jerome.free.fr/index.php?articles/Les-nouveaux-tags-en-html5">Les nouveaux tags HTML 5</a></li>
  </ul>
</div>
