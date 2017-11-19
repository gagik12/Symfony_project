<h1>Hello World</h1>
<h2>My name is: <?php echo $username?></h2>

<?php if ($sf_params->has('username')): ?>
  <h2>My name is: <?php echo $sf_params->get('username') ?></h2>
<?php endif; ?>