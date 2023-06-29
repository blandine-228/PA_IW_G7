<?php if(!empty($errors)): ?>
<?php print_r($errors);?>
<?php endif;?>


<form method="<?= $config["config"]["method"] ?>"
      action="<?= $config["config"]["action"] ?>"
      enctype="<?= $config["config"]["enctype"] ?>"
      id="<?= $config["config"]["id"] ?>"
      class="<?= $config["config"]["class"] ?>">

    <?php foreach ($config["inputs"] as $name=>$configInput): ?>

        <input
                name="<?= $name ?>"
                placeholder="<?= $configInput["placeholder"] ?>"
                class="<?= $configInput["class"] ?>"
                id="<?= $configInput["placeholder"] ?>"
                type="<?= $configInput["type"] ?>"
                value="<?= $configInput["value"]??"" ?>" 
                 
                <?php  if(isset($configInput["required"]) && $configInput["required"]==true)echo "required"; ?>
         ><br>

    <?php endforeach;?>

    <input type="submit" name="submit" value="<?= $config["config"]["submit"] ?>">
    <?php if (isset($config["config"]["reset"])): ?>
     <input type="reset" value="<?= $config["config"]["reset"] ?>">
    <?php endif; ?>

</form>