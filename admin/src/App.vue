<template>
  <div id="app">
    <header>
      <!-- Barre de navigation -->
      <nav>
        <router-link to="/paires">Liste des paires</router-link>
        <router-link to="/paires/ajouter">Ajouter une paire</router-link>
      </nav>
    </header>

    <main>
      <!-- Affichage du contenu de chaque route -->
      <router-view></router-view>
      
      <!-- Utilisez le composant AjoutPaire en transmettant la propriété "currencies" -->
      <AjoutPaire :currencies="currencies" @paire-ajoutee="onPaireAjoutee" />
    </main>

    <footer>
      <!-- Pied de page -->
      <p>© {{ currentYear }} Votre Société</p>
    </footer>
  </div>
</template>

<script>
import axios from 'axios';
import AjoutPaire from './components/AjoutPaire.vue';

export default {
  components: {
    AjoutPaire,
  },
  data() {
    return {
      currentYear: new Date().getFullYear(),
      currencies: [],
    };
  },
  methods: {
    onPaireAjoutee(nouvellePaire) {
      // Traitez la nouvelle paire ajoutée ici si nécessaire
      console.log('Nouvelle paire ajoutée :', nouvellePaire);

      // Enregistrez la nouvelle paire en utilisant Axios
      axios.post('http://localhost:8000/api/pairs', {
        currencie_source_id: nouvellePaire.source.id,
        currencie_cible_id: nouvellePaire.cible.id,
        taux_conversion: nouvellePaire.tauxConversion,
        nombre_conversion: nouvellePaire.nombreConversion,
      })
        .then(response => {
          // Traitement réussi de l'ajout de la paire
          console.log('Nouvelle paire enregistrée :', response.data);

          // Met à jour le tableau pairs avec la nouvelle paire enregistrée
          this.pairs.push(response.data);
        })
        .catch(error => {
          console.error('Erreur lors de l\'ajout de la paire :', error);
        });
    },

  },
  mounted() {
    // Récupère les devises depuis votre API Laravel ici et met à jour dans la propriété "currencies"
    axios.get('http://localhost:8000/api/currencies')
      .then(response => {
        this.currencies = response.data; // Met à jour les devises ici
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des devises :', error);
      });
  },
};
</script>

<style>

header {
  background-color: #5378b4;
  color: white;
  padding: 10px;
}

nav {
  display: flex;
  justify-content: space-between;
}

nav a {
  color: white;
  text-decoration: none;
  padding: 5px 10px;
}

footer {
  background-color: #9425d9;
  color: white;
  padding: 10px;
  text-align: center;
}
</style>