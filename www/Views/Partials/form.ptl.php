<style>
  .form-button {
    padding: 10px 10px;
   height: 30px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    /* Ajoutez d'autres styles selon vos besoins */
}

.form-button-res {
    padding: 10px 10px;
   height: 30px;
    background-color: #cc3434;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    /* Ajoutez d'autres styles selon vos besoins */
}

</style>
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

    <input type="submit" name="submit" value="<?= $config["config"]["submit"] ?>" class="form-button">
    <?php if (isset($config["config"]["reset"])): ?>
     <input type="reset" value="<?= $config["config"]["reset"] ?>" class="form-button-res">
    <?php endif; ?>

</form>