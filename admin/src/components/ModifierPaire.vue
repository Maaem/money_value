<template>
    <div>
      <h2>Modifier la Paire</h2>
      <form @submit.prevent="modifierPair">
        <div>
          <label>Devise source:</label>
          <select v-model="currencieSourceId">
            <option v-for="currencie in currencies" :value="currencie.id" :key="currencie.id">
              {{ currencie.nom }}
            </option>
          </select>
        </div>
        <div>
          <label>Devise cible:</label>
          <select v-model="currencieCibleId">
            <option v-for="currencie in currencies" :value="currencie.id" :key="currencie.id">
              {{ currencie.nom }}
            </option>
          </select>
        </div>
        <div>
          <label>Taux de conversion:</label>
          <input type="number" v-model="tauxConversion" step="0.01" required />
        </div>
        <div>
          <button type="submit">Enregistrer</button>
          <button @click="annulerModification">Annuler</button>
        </div>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      pair: {
        type: Object,
        required: true,
      },
      currencies: {
        type: Array,
        required: true,
      },
    },
    data() {
      return {
        currencieSourceId: this.paire.currencie_source_id,
        currencieCibleId: this.paire.currencie_cible_id,
        tauxConversion: this.paire.taux_conversion,
      };
    },
    methods: {
      modifierPaire() {
        // Appeler une méthode du parent pour enregistrer les modifications
        this.$emit('modifier-pair', {
          id: this.pair.id,
          currencie_source_id: this.currencieSourceId,
          currencie_cible_id: this.currencieCibleId,
          taux_conversion: this.tauxConversion,
        });
      },
      annulerModification() {
        // Rediriger vers la page de liste des paires
        this.$router.push({ name: 'ListePaires' });
      },
    },
  };
  </script>
  