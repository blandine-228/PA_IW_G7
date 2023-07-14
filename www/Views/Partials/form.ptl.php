<?php if(!empty($errors)): ?>
<?php print_r($errors);?>
<?php endif;?>


<form method="<?= $config["config"]["method"] ?>"
      action="<?= $config["config"]["action"] ?>"
      enctype="<?= $config["config"]["enctype"] ?>"
      id="<?= $config["config"]["id"] ?>"
      class="<?= $config["config"]["class"] ?>">

    <?php foreach ($config["formFields"] as $name=>$configInput): ?>
        <div class="relative w-5/6 mb-3 flex flex-col justify-center align-middle">
            <label
                for="<?= $name ?>"
                class="<?= $configInput["labelClass"]?>"
            >
                <?= $configInput["placeholder"] ?>
            </label>
            <input
                name="<?= $name ?>"
                class="<?= $configInput["class"] ?>"
                id="<?= $configInput["placeholder"] ?>"
                type="<?= $configInput["type"] ?>"
                <?= $configInput["required"]?"required":"" ?>
            >
        </div>
    <?php endforeach;?>


    <div class="text-center mt-6">
        <input type="submit" name="submit" value="<?= $config["config"]["submit"] ?>" class="bg-gray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">
        <input type="reset" value="<?= $config["config"]["reset"] ?>">
    </div>

</form>