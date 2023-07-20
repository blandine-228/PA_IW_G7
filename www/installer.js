(function () {
    
    function install() {
      // Demander les informations de connexion à la base de données
      const dbHost = prompt("Entrez l'hôte de la base de données:");
      const dbUsername = prompt("Entrez le nom d'utilisateur de la base de données:");
      const dbPassword = prompt("Entrez le mot de passe de la base de données:");
      const dbName = prompt("Entrez le nom de la base de données:");
  
      // Envoyer les informations de connexion à PHP pour traitement
      fetch("install.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          host: dbHost,
          username: dbUsername,
          password: dbPassword,
          dbName: dbName,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            alert("L'installation a été effectuée avec succès !");
          } else {
            alert("Une erreur s'est produite lors de l'installation. Veuillez vérifier vos informations de connexion à la base de données.");
          }
        })
        .catch((error) => {
          alert("Une erreur s'est produite lors de l'installation.");
          console.error(error);
        });
    }
  
    // Appeler la fonction d'installation lorsque la page a fini de charger
    window.onload = function () {
      install();
    };
  })();

  //Loading Screen

  function onReady(callback) {
    var intervalId = window.setInterval(function() {
      if (document.getElementsByTagName('body')[0] !== undefined) {
        window.clearInterval(intervalId);
        callback.call(this);
      }
    }, 1000);
  }
  
  function setVisible(selector, visible) {
    document.querySelector(selector).style.display = visible ? 'block' : 'none';
  }
  
  onReady(function() {
    setVisible('.page', true);
    setVisible('#loading', false);
  });
  