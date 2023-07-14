// config.js
const config = {
    steps: [
        {
            title: "Étape 1 : Configuration de la base de données",
            fields: [
                { name: "DB_TYPE", label: "Type de base de données", defaultValue: "MySQL" },
                { name: "DB_HOST", label: "Nom d'hôte" },
                { name: "DB_NAME", label: "Nom de la base de données" },
                { name: "DB_PORT", label: "Port de la base de données", defaultValue: "3306" },
                { name: "DB_USERNAME", label: "Nom d'utilisateur" },
                { name: "DB_PASSWORD", label: "Mot de passe" }
            ]
        },
        {
            title: "Étape 2 : Configuration de l'administrateur",
            fields: [
                { name: "firstname", label: "Prénom" },
                { name: "lastname", label: "Nom" },
                { name: "email", label: "Courriel" },
                { name: "pwd", label: "Mot de passe" }
            ]
        },
        {
            title: "Étape 3 : Ajouter un script SQL",
            fields: [
                { name: "sqlScript", label: "Script SQL", type: "textarea" }
            ]
        }
    ]
};

// Exporter la configuration
export default config;