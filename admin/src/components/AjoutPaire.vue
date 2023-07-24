<template>
  <div>
    <h2>Ajouter une nouvelle Paire</h2>
    <form @submit.prevent="ajouterPaire">
      <div>
        <label>Devise source:</label>
        <input type="text" v-model="currencieSourceId" />
      </div>
      <div>
        <label>Devise cible:</label>
        <input type="text" v-model="currencieCibleId" />
      </div>
      <div>
        <label>Taux de conversion:</label>
        <input type="number" v-model="tauxConversion" step="0.01" required />
      </div>
      <div>
        <button type="submit">Ajouter</button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    currencies: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      currencieSourceId: '',
      currencieCibleId: '',
      tauxConversion: null,
    };
  },
  methods: {
    ajouterPaire() {
      const nouvellePaire = {
        currencie_source_id: this.currencieSourceId,
        currencie_cible_id: this.currencieCibleId,
        taux_conversion: this.tauxConversion,
      };

      // Appeler une requête POST vers l'API pour ajouter la nouvelle paire
      axios
        .post('http://localhost:8000/api/paires', nouvellePaire)
        .then((response) => {
          // La paire a été ajoutée avec succès
          console.log('Nouvelle paire ajoutée :', response.data);

          // Vous pouvez également émettre un événement pour informer le parent que la paire a été ajoutée
          this.$emit('paire-ajoutee', response.data);

          // Réinitialiser les champs du formulaire après l'ajout
          this.currencieSourceId = '';
          this.currencieCibleId = '';
          this.tauxConversion = null;
        })
        .catch((error) => {
          console.error('Erreur lors de l\'ajout de la paire :', error);
        });
    },
  },
};
</script>
