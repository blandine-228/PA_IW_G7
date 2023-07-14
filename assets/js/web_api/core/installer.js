import config from './config.js';
import api from './api.js';

// Éléments du DOM
const stepsContainer = document.getElementById('steps-container');

// Étape actuelle
let currentStep = 0;
const totalSteps = config.steps.length;

// Fonction pour afficher l'étape actuelle
function renderCurrentStep() {
    const step = config.steps[currentStep];
    const stepHTML = document.createElement('div');
    stepHTML.innerHTML = `
    <h2>${step.title}</h2>
    <form id="step-form">
      ${step.fields.map(field => `
        <label for="${field.name}">${field.label}</label>
        ${field.type === 'textarea' ? `<textarea name="${field.name}" id="${field.name}" rows="5"></textarea>` :
        `<input type="text" name="${field.name}" id="${field.name}" value="${field.defaultValue || ''}">`}
      `).join('')}
      <button type="submit">Suivant</button>
    </form>
  `;

    stepsContainer.innerHTML = '';
    stepsContainer.appendChild(stepHTML);

    // Gérer la soumission du formulaire de l'étape actuelle
    const stepForm = document.getElementById('step-form');
    stepForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(stepForm);
        const formEntries = [...formData.entries()];
        const stepData = Object.fromEntries(formEntries);

        // Appeler l'API pour enregistrer les données de l'étape
        await api.saveStepData(currentStep, stepData);

        // Passer à l'étape suivante
        currentStep++;
        if (currentStep < totalSteps) {
            renderCurrentStep();
        } else {
            // L'installation est terminée
            stepsContainer.innerHTML = '<h2>Installation terminée !</h2>';
        }
    });
}

// Démarrer l'installeur
renderCurrentStep();