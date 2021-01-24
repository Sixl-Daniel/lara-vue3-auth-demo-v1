import store from './store';
import { createRouter, createWebHashHistory } from 'vue-router';

import HomePage from './vue/components/HomePage.vue';
import LoginPage from './vue/components/LoginPage.vue';
import RegisterPage from './vue/components/RegisterPage.vue';

const routes = [
    { path: '/', component: HomePage, name: 'home' },
    { path: '/login', component: LoginPage, name: 'login' },
    { path: '/register', component: RegisterPage, name: 'register' },
    { path: '/:notFound(.*)', redirect: { name: 'home' } },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes: routes,
});

router.beforeEach((to, from, next) => {
    if (to.name !== 'login' && to.name !== 'register' && !store.getters.authenticatedUser) {
        next({ name: 'login' });
    } else if ((to.name === 'login' || to.name === 'register') && store.getters.authenticatedUser) {
        next({ name: 'home' });
    } else next();
})

export default router;
