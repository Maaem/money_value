<template>
    <div>
      <!-- Afficher la liste des paires ici -->
      <h2>Liste des Paires</h2>
      <ul>
        <li v-for="paire in paires" :key="paire.id">
          {{ paire.currencie_source_id }} -> {{ paire.currencie_cible_id }} : {{ paire.taux_conversion }}
        </li>
      </ul>
  
      <!-- Inclure le composant AjoutPaire pour permettre d'ajouter une nouvelle paire -->
      <AjoutPaire :currencies="currencies" @paire-ajoutee="handlePaireAjoutee" />
    </div>
  </template>
  
  <script>
  import AjoutPaire from './AjoutPaire.vue';
  import axios from 'axios';
  
  export default {
    components: {
      AjoutPaire,
    },
    data() {
      return {
        paires: [],
        currencies: [],
      };
    },
    methods: {
      // Appel à l'API pour récupérer la liste des paires de devises
      chargerPaires() {
        axios
          .get('http://localhost:8000/api/paires')
          .then((response) => {
            this.paires = response.data;
          })
          .catch((error) => {
            console.error('Erreur lors de la récupération des paires :', error);
          });
      },
      // Méthode pour gérer l'événement de nouvelle paire ajoutée
      handlePaireAjoutee(nouvellePaire) {
        // Ajouter la nouvelle paire à la liste des paires affichées
        this.paires.push(nouvellePaire);
      },
    },
    mounted() {
      // Charger la liste des paires lors de la création du composant
      this.chargerPaires();
    },
  };
  </script>
  
  <style>
  /* Vos styles CSS ici */
  </style>
  