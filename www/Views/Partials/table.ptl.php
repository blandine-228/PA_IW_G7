<table id="<?= $config["config"]["id"] ?>" class="<?= $config["config"]["class"] ?>">
    <thead>
        <tr>
            <?php foreach ($config["headers"] as $key => $header): ?>
                <th><?= $header ?></th>
            <?php endforeach; ?>
            <?php if(!empty($config["actions"])): ?>
                <th>Actions</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($config["data"] as $user): ?>
            <tr>
                <?php foreach ($config["body"] as $key => $value): ?>
                    <td><?= $user->{"get".ucfirst($value)}() ?></td>  <!-- Utilisation des méthodes d'accès -->
                <?php endforeach; ?>
                <?php if(!empty($config["actions"])): ?>
                    <td>
                        <?php foreach ($config["actions"] as $action => $url): ?>
                            <a href="<?= $url . $user->getId() ?>"><?= ucfirst($action) ?></a> <!-- Suppose que vous avez une méthode getId() -->
                        <?php endforeach; ?>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script> $(document).ready(function() {
        $("<?= "#" . $config["config"]["id"] ?>").DataTable({
            ordering: false,
            paging: false,
            info: false,
        });
    });</script>