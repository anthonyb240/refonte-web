// Fonction pour afficher le contenu en fonction de l'ID
function afficherTexte(id) {
    // Récupérer l'élément où le contenu sera affiché
    const contenuDiv = document.getElementById('contenu');
  
    // Créer un objet avec les contenus associés à chaque ID
    const contenus = {
      dev: `
        <h2>Développement et Intégration Logicielle</h2>

        <ul>
          <li>Développement Full Stack : Nous maîtrisons les technologies modernes, que ce soit pour la création d'applications web performantes en React, Vue.js, et Angular (front-end), ou de Node.js, Python et Ruby on Rails (back-end). Nous intégrons également des bases de données relationnelles (MySQL, PostgreSQL) et non relationnelles (MongoDB, Cassandra).</li>
          <li>Architecture Microservices : Nous concevons des systèmes scalables et résilients en utilisant des architectures de microservices avec Docker, Kubernetes, et des outils comme Apache Kafka pour l'orchestration et le traitement des flux de données en temps réel.</li>
          <li>API RESTful & GraphQL : Nous développons des API robustes, sécurisées et performantes, en mettant un accent particulier sur les principes de REST et GraphQL pour une meilleure gestion des données et des interactions entre services.</li>
        </ul>
      `,

      cyber: `
        <h2>Cybersécurité et Protection des Systèmes</h2>

        <ul>
          <li>Pentesting & Audit de Sécurité : Nos experts réalisent des audits de sécurité approfondis, identifiant les vulnérabilités et mettant en œuvre des solutions de mitigation à travers des tests d'intrusion (Pentesting) sur les applications web, les infrastructures réseaux et les dispositifs IoT.</li>
          <li>Sécurisation des Applications : Nous appliquons des pratiques de sécurité avancées telles que l'OWASP Top 10, le chiffrement des données sensibles via AES-256, et l'implémentation de mécanismes d'authentification forts comme OAuth2 et JWT.</li>
          <li>Gestion des Identités et des Accès (IAM) : Grâce à des outils comme Okta et Azure AD, nous assurons la gestion fine des utilisateurs, des rôles et des permissions dans les systèmes d'information, en adoptant des stratégies telles que le contrôle d'accès basé sur les rôles (RBAC) et l'authentification multifacteur (MFA).</li>
          <li>Sécurité des Infrastructures Cloud : Nous mettons en œuvre des pratiques de sécurité pour les environnements AWS, Azure et Google Cloud (GCP), notamment la gestion des politiques de sécurité, des firewalls applicatifs (WAF) et la mise en place de solutions de monitoring pour la détection des intrusions.</li>
        </ul>
      `,

      ia: `
        <h2>Intelligence Artificielle et Data Science</h2>

        <ul>
          <li>Machine Learning et Deep Learning : Nous appliquons les techniques les plus avancées du Machine Learning et du Deep Learning pour des projets de classification, régression, et analyse prédictive. Nous utilisons des frameworks comme TensorFlow, PyTorch et Scikit-learn pour créer des modèles efficaces et performants.</li>
          <li>Traitement du Langage Naturel (NLP) : Nous développons des solutions de traitement du langage naturel à l'aide de modèles de pointe tels que BERT et GPT, pour la compréhension automatique de texte, l'analyse sémantique, et la génération de texte.</li>
          <li>Big Data & Data Engineering : Nous concevons des pipelines de données scalables en utilisant des technologies telles que Apache Hadoop, Spark, Flink, ainsi que des bases de données distribuées comme HBase et Cassandra pour le traitement des données massives.</li>
        </ul>
      `,

      devops: `
        <h2>DevOps et Automatisation</h2>

        <ul>
          <li>CI/CD & Automatisation des Déploiements : Nous mettons en place des chaînes d'intégration continue (CI) et de déploiement continu (CD) à l'aide d'outils tels que Jenkins, GitLab CI, et CircleCI, permettant une livraison rapide et fiable des applications.</li>
          <li>Infrastructure as Code (IaC) : Nous utilisons des outils comme Terraform, Ansible, et Chef pour automatiser la gestion des infrastructures et garantir la reproductibilité des environnements de production.</li>
          <li>Monitoring et Logging : Nous déployons des solutions de surveillance avancées avec des outils comme Prometheus, Grafana, ELK Stack (Elasticsearch, Logstash, Kibana), pour assurer la stabilité et la performance de vos systèmes.</li>
        </ul>
      `,

      blockchain: `
        <h2>Blockchain et Technologies Décentralisées</h2>

        <ul>
          <li>Développement de Smart Contracts : Nous concevons et déployons des smart contracts sur des plateformes telles qu'Ethereum, Solana, et Polkadot, garantissant la sécurité et la transparence des transactions.</li>
          <li>Crypto-monnaies et DeFi : Nous maîtrisons la création d'applications décentralisées (dApps) et la mise en œuvre de solutions DeFi (finance décentralisée), permettant l'automatisation des processus financiers à travers la blockchain.</li>
        </ul>
      `,

      innovation: `
        <h2>Innovation et Recherche Technologique</h2>
        <ul>
          <li>Internet des Objets (IoT) : Nous intégrons des solutions IoT pour la collecte de données en temps réel, la gestion d'appareils connectés, et l'analyse des flux de données dans des systèmes intelligents.</li>
          <li>Réalité Augmentée (AR) et Réalité Virtuelle (VR) : Nous explorons les possibilités offertes par la réalité augmentée et la réalité virtuelle pour des applications immersives dans les domaines du jeu, de la formation, et de la visualisation des données.</li>
          </ul>
      `
    };
  
    // Vérifier si l'ID existe et insérer le contenu correspondant
    if (contenus[id]) {
      contenuDiv.innerHTML = contenus[id];
    } else {
      contenuDiv.innerHTML = "<p>Contenu introuvable.</p>";
  }
}

function cacherTexte() {
  const contenuDiv = document.getElementById('contenu');
  contenuDiv.innerHTML = "";  // Vider le contenu du div
}

// Ajouter un événement de clic sur les cellules du tableau
const cellules = document.querySelectorAll('th');

cellules.forEach(cellule => {
  let estAffiche = false;  // Variable pour vérifier si le texte est affiché ou caché
  
  cellule.addEventListener('click', function() {
    const id = cellule.getAttribute('data-id');
    
    // Si le texte est déjà affiché, le cacher
    if (estAffiche) {
      cacherTexte();
      estAffiche = false;
    } else {
      // Afficher le texte associé à la cellule
      afficherTexte(id);
      estAffiche = true;
    }
  });
});
