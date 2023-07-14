const api = {
    async saveStepData(stepIndex, stepData) {
        try {
            const response = await fetch('/api/save-step-data', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    stepIndex,
                    stepData
                })
            });

            if (!response.ok) {
                throw new Error('Erreur lors de l\'enregistrement des données de l\'étape.');
            }

            // Enregistrer les données de l'étape réussie
            console.log('Données de l\'étape enregistrées avec succès !');
        } catch (error) {
            console.error(error);
            // Gérer l'erreur lors de l'enregistrement des données de l'étape
        }
    }
};

// Exporter les fonctions de l'API
export default api;
