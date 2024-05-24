<h1>Articles</h1>
<!-- pre><?php print_r($data['articles']) ?></pre -->
<hr>
<ul>
<?php for($i = 0; $i < count($data['articles']); $i++)  { ?>
  <li>
    <?php print($data['articles'][$i]->getTitle()); ?>
  </li>
<?php } ?>
</ul>