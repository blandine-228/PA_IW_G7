<main role="main">
    <nav class="">
        <ul class="steps steps-vertical lg:steps-horizontal">
            <li class="step step-primary">Configuration de la BDD</li>
            <li class="step">Informations administrateur</li>
            <li class="step">Ajout de données BDD</li>
            <li class="step">Récapitulatif</li>
        </ul>
    </nav>

    <h1>Entrez ci-dessous les informations concernant votre BDD</h1>

    <?php $this->partial("form", $form, $formErrors); ?>
</main>
