<form method="<?= $config["config"]["method"] ?>"
      action="<?= $config["config"]["action"] ?>"
      enctype="<?= $config["config"]["enctype"] ?>"
      id="<?= $config["config"]["id"] ?>"
      class="<?= $config["config"]["class"] ?>">

    <?php foreach ($config["inputs"] as $name=>$configInput): ?>
      <div class="form-group">
        <input
                name="<?= $name ?>"
                placeholder="<?= $configInput["placeholder"] ?? "" ?>"
                class="<?= $configInput["class"] ?? "" ?>"
                id="<?= $configInput["id"] ?? "" ?>"
                type="<?= $configInput["type"] ?? "text" ?>"
                value="<?= $configInput["value"] ?? "" ?>"
                <?php  if(isset($configInput["required"]) && $configInput["required"]==true) echo "required"; ?>
        ><br><br>
      </div>
    <?php endforeach;?>

    <input type="submit" name="submit" value="<?= $config["config"]["submit"] ?>">
    <?php if (isset($config["config"]["reset"])): ?>
     <input type="reset" value="<?= $config["config"]["reset"] ?>">
    <?php endif; ?>

</form>
