<template>
    <div>
      <h2>Liste des Paires</h2>
      <ul>
        <li v-for="currencie in currencies" :key="currencie.id">
          {{ currencie.devise_source.nom }} -> {{ currencie.devise_cible.nom }} : {{ currencie.taux_conversion }}
          <button @click="editPair(currencie.id)">Modifier</button>
          <button @click="deletePair(currencie.id)">Supprimer</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      paires: {
        type: Array,
        required: true,
      },
    },
    methods: {
      editPair(pairId) {
        // Rediriger vers la page de modification avec l'ID de la paire
        this.$router.push({ name: 'EditPair', params: { id: pairId } });
      },
      deletePaire(pairId) {
        // Appeler une méthode du parent pour supprimer la paire
        this.$emit('delete-paire', pairId);
      },
    },
  };
  </script>
  