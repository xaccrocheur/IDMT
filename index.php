<?php
  $coursDirectory = 'COURS';
  
  /* No user serviceable parts below */
  
  include_once('cgi-bin/simple_html_dom.php');
  $article_selected = true;
  $file_exists = true;
  $coursDirectoryPath = './'.$coursDirectory.'/';
  
  if (!isset($_GET['cours'])) {
      $article_selected = false;
      /* echo "yowz!"; */
  } else {
      $mycours = $coursDirectoryPath.strip_tags($_GET['cours']).'.php';
      if(file_exists($mycours))  { 
          $id = $mycours;
      } else {
          $file_exists = false;
      }
  }
  
  if (!$article_selected) {
      
      if ($myhandle = opendir($coursDirectoryPath)) {
          while (false !== ($myfile = readdir($myhandle))) {
              if (substr($myfile, -4) == ".php" && preg_match("/[1-9]/", $myfile)) {
                  $myinfo = pathinfo($myfile);
                  $myfilename =  basename($myfile,'.'.$myinfo['extension']);
                  $myarticles[$myfilename] = $coursDirectoryPath.$myfile;
                  uasort($myarticles, 'strcasecmp');
              }
          }
          closedir($myhandle);
      }
      
      foreach($myarticles as $myarticlename => $myarticlefile) {
          
          $myhtml = file_get_html($myarticlefile);
          
          foreach($myhtml->find('h1') as $myelement) {
              $myh1 = $myelement->innertext;
          }
          foreach($myhtml->find('h2[id=main]') as $mymelement) {
              $myh2 = $mymelement->innertext;
          }
          $mydoc['h1'] = $myh1;
          $mydoc['h2'] = $myh2;
          $mydoc['url'] = $myarticlename;
          $mydocs[] = $mydoc;
      }
  } elseif ($file_exists) {
      $thiscours = $id;
      $thishtml = file_get_html($thiscours);
      
      foreach($thishtml->find('h1') as $myelement) {
          $thish1 = $myelement->innertext;
      }
  }
  
  function hl($s){
      $s = str_replace('<', '&lt;', $s);
      $s = str_replace('>', '&gt;', $s);
      echo $s;
  }
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="robots" content="noindex, nofollow">
    
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="cgi-bin/js/jquery.snippet.js"></script>
    <script type="text/javascript" src="cgi-bin/js/jquery.TableOfContents.js"></script>
    <script type="text/javascript" src="cgi-bin/js/jquery.quiz.js"></script>
    <script type="text/javascript" src="cgi-bin/js/foutbgone.js"></script>
    <script type="text/javascript" src="cgi-bin/js/jquery.color.js"></script>

    <link rel="stylesheet" type="text/css" href="cgi-bin/css/cours.css" />
    <link rel="stylesheet" type="text/css" href="cgi-bin/css/jquery.snippet.css" />
    <link rel="shortcut icon" href="img/doc.png" type="image/x-icon" />
    
    <script type="text/javascript">
    fbg.hideFOUT('asap', 400);      
      $(document).ready(function(){

	  
	  $("ol#jquiz").hide();
          $("div#quiz h2").click(function() {
              $("ol#jquiz").slideToggle(500);
          });
          
          var langage = $('pre.code').attr('title');
          $("pre.code").snippet(langage, {style:"easter",showNum:true});
          
          $("a.tagref").each(function() {
              $(this).attr("href", "http://w3schools.com/tags/tag_" + $(this).text() + ".asp");
          });
          
      });
      
      $(function(e) {
          $('#TableOfContentsContainer')
              .TableOfContentsBehavior('div.main', 'ul');
      });
      
    </script>
    
    <? 
      
      
      if ($article_selected && $file_exists) {
          echo '<title>'.$thish1.' - Publication Web</title>';
      } else {
          echo '<title>Publication Web</title>';
      }
      
    ?>
    
  </head>
  
  <body>
    
    
    <?php 
      if (!$article_selected || !$file_exists) {
          echo '
      <div id="myControls" style="display:none;">
      ';
      } 
      else {
          echo '
      <div id="myControls">
      ';      
      }
    ?>
    
    <a href="./"><img src="img/home.png" alt="Retour index" />&nbsp;Retour index</a>
    <br />
    <select id="rotator">
      <option value="acid">acid</option>
      
      <option>berries-dark</option>
      <option>berries-light</option>
      <option>bipolar</option>
      <option>blacknblue</option>
      <option>bright</option>
      <option>contrast</option>
      
      <option>darkblue</option>
      <option>darkness</option>
      <option>desert</option>
      <option>dull</option>
      <option selected="selected">easter</option>
      <option>emacs</option>
      
      <option>golden</option>
      <option>greenlcd</option>
      <option>ide-anjuta</option>
      <option>ide-codewarrior</option>
      <option>ide-devcpp</option>
      <option>ide-eclipse</option>
      
      <option>ide-kdev</option>
      <option>ide-msvcpp</option>
      <option>kwrite</option>
      <option>matlab</option>
      <option>navy</option>
      <option>nedit</option>
      
      <option>neon</option>
      <option>night</option>
      <option>pablo</option>
      <option>peachpuff</option>
      <option>print</option>
      <option>rand01</option>
      
      <option>the</option>
      <option>typical</option>
      <option>vampire</option>
      <option>vim</option>
      <option>vim-dark</option>
      <option>whatis</option>
      
      <option value="whitengrey">whitengrey</option>
      <option value="zellner">zellner</option>
    </select>
    <br />
    <div id="controls"></div>
</div>

<script type="text/javascript">
    
  function displayVals() {
      var singleValues = $("#rotator").val();
      var multipleValues = $("#multiple").val() || [];
      $("pre.code").snippet({style:singleValues,showNum:true});
      $("#controls").html("<b>Style:</b> " + singleValues);
  }
  
  $("select").change(displayVals);
  displayVals();
  
</script>


<div class="main">
  
  <?php 
      if (!isset($_GET['cours'])) {
          /* foreach ($myh2 as $mynewh2) { */
          
          /*     echo ' */
          /*     <a href="?cours='.$articlename.'" title="'.$h2.'"><h3>'.$h1.'</h3></a> */
          /*     <p>'.$h2.'</p>'; */
          
          /*     echo $mynewh2; */
          /* } */
      }
  ?>
  
  <?php 
    if (!$article_selected) {
        echo '
    <div class="home">
    <h1>Publication Web</h1>
    <h2>'.count($mydocs).'&nbsp;Cours disponibles</h2>
    <div class="liste">';
            foreach ($mydocs as $mydoc) {
                echo '<a href="?cours='.$mydoc['url'].'" title="'.$mydoc['h2'].'"><h3>'.$mydoc['h1'].'</h3></a>
    <p>'.$mydoc['h2'].'</p>';
            }
            echo '
    </div>
    </div>
    ';
    } else {
        if($file_exists)  { 
            echo '<div id="TableOfContentsContainer"></div>';
            include($mycours);
        } else {
            echo '<h1>Publication Web</h1><h2><a href="./">Accueil</a></h2>';
        }
    }
  ?>
  
</div> <!-- end main -->

<div id="footer">
  <p>
    <a onclick="window.location=&quot;view-source:&quot; + window.location.href" class="button" href="#">Source de la page</a>&nbsp;|&nbsp;&copy;Philippe M. Coatmeur 2011&nbsp;|&nbsp;<a href="http://validator.w3.org/check?uri=referer" title="Validation X/HTML">Validation HTML</a>
    
  </p>
</div>

  <audio id="error" preload="auto">
    <source src="cgi-bin/error.wav" type="audio/wav">
  </audio>

  <audio id="success" preload="auto">
    <source src="cgi-bin/success.wav" type="audio/wav">
      <!-- Your browser does not support HTML5 audio. -->
  </audio>

</body>
</html>

