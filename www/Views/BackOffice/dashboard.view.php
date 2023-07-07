<section>
    <div class="widget">
        <div class="widget-content">
            <div id="chart-container"></div>
        </div>
    </div>
    <!-- Ajouter d'autres widgets ici -->
    <script>
        var data = [
            ['Janvier', 100],
            ['Février', 200],
            ['Mars', 150],
            // Ajoutez plus de données ici
        ];

        // Configuration du graphique
        var chartOptions = {
            chart: {
                type: 'pie' // Type de graphique, par exemple 'line', 'bar', 'pie', etc.
            },
            title: {
                text: 'Statistiques mensuelles'
            },
            xAxis: {
                type: 'category',
                title: {
                    text: 'Mois'
                }
            },
            yAxis: {
                title: {
                    text: 'Valeur'
                }
            },
            series: [{
                name: 'Statistiques',
                data: data // Utilisez vos données réelles ici
            }]
        };

        // Création du graphique
        Highcharts.chart('chart-container', chartOptions);
    </script>
</section>