// router/index.js

import { createRouter, createWebHistory } from 'vue-router';
import ListePaires from '../components/ListePaires.vue';
import AjouterPaire from '../components/AjoutPaire.vue';

const routes = [
  {
    path: '/paires',
    component: ListePaires,
  },
  {
    path: '/paires/ajouter',
    component: AjouterPaire,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
