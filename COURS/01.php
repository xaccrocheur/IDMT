<h1>HTML : Le contenu</h1>
<h2 id="main">Définition d' une page html</h2>

<p>La page html est <em>l'élément de base</em> du <a href="http://wikipedia.org/wiki/World_Wide_Web">world wide web</a>. Servie par un serveur web, elle est lue sur le poste de l'internaute à l'aide d'un client HTML, aussi appelé browser, ou navigateur. Pour savoir comment sont faites les pages vues sur le web, il suffit d'activer la fonction "Afficher la source" dans le menu principal du navigateur.
</p>

<hr />
<h3>Tags et balises</h3>
<p>Un tag HTML (aussi appelé balise, ou encore conteneur) définit les propriétés des éléments (texte, image, video, etc.) qu'il contient. La page elle-même est contenue dans le tag <a class="tagref">html</a>. Les tags suivants sont contenus dans ce tag, et ainsi de suite. On parle ainsi d'héritage, et de relations parents / enfants. Dans l'exemple suivant, le tag <a class="tagref">head</a> est l'enfant du tag <a class="tagref">html</a>, et le parent du tag <a class="tagref">title</a>.
</p>

<pre class="code" title="html">
  <?php
	       hl('
    <!-- la page html minimale doit comporter obligatoirement les tags suivants -->
<html>
  <head>
    <title>Titre de la page</title>
  </head>
  <body>
    <p>Corps du texte</p>
  </body>
</html>
    ');
  ?>
</pre>


<h4>Exercice</h4>
<p>Dans un document vide, recopiez les tags de base pour construire une page web minimale. </p>

<h3>Les liens hypertextes</h3>
<p>Le tag <a class="tagref">a</a>.
</p>

<pre class="code" title="html">
  <?php
	       hl('
<a href="http://google.com">Un clic sur cet élément dirige vers http://google.com</a>
    ');
  ?>
</pre>


<div id="liens">
  <h2>Liens</h2>
  <ul>
    <li><a href="http://www.w3.org/TR/html4/index/elements.html">Liste
        complète des tags HTML 4 / XHTML 1</a></li>
    <li><a href="http://debray.jerome.free.fr/index.php?articles/Les-nouveaux-tags-en-html5">Les nouveaux tags HTML 5</a></li>
  </ul>
</div>

<div id="quiz">
  <h2>Quiz</h2>
  <ol id="jquiz">
    <li>
      <p>Le HTML permet de styler le contenu.</p>
      <ul>
	<li>Vrai</li>
	<li class="correct">Faux</li>
      </ul>
      <div class="explanation hidden">
	<p>Le style, c'est l'affaire des <a href="./?cours=02">CSS</a>.</p>
      </div>
    </li>
    <li>
      <p>Quel est le nom du tag qui permet de faire un lien ?</p>
      <ul>
	<li class="correct"><a class="tagref">a</a></li>
	<li><a class="tagref">b</a></li>
	<li><a class="tagref">c</a></li>
      </ul>
      <div class="explanation hidden">
	<p>Un lien s'effectue à l'aide du tag <a class="tagref">a</a>, spécifiquement à l'aide de l'attribut <strong>href</strong>.</p>
      </div>
    </li>
    <li>
      <p>Que signifie l'acronyme HTML ?</p>
      <ul>
	<li>Heuristic Transversal Mil-spec Lampoon</li>
	<li class="correct">Hyper Text Markup Langage</li>
	<li>Hypra Terminal Millenium Lineage</li>
      </ul>
      <div class="explanation hidden">
	<p>HTML signifie Hyper Text Markup Langage</p>
      </div>
    </li>
  </ol>
  <div id="jquizremarks">
    <p id="jquiztotal">&nbsp;</p>
  </div>
</div>
