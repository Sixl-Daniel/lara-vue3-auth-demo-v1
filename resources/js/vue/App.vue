<template>
    <div :class="{ 'is-clipped': error }">
        <navbar></navbar>
        <error-modal></error-modal>
        <router-view></router-view>
    </div>
</template>

<script>
import { defineAsyncComponent, ref } from "vue";
import Navbar from "./components/Navbar.vue";

const ErrorModal = defineAsyncComponent(() =>
    import("./components/ErrorModal.vue")
);

export default {
    setup() {
        let message = ref("Vue is running.");
        return { message };
    },
    components: {
        Navbar,
        ErrorModal,
    },
    created() {
        let authenticatedUser = localStorage.getItem("authenticatedUser");
        if (authenticatedUser && authenticatedUser != null) {
            this.$store.commit(
                "setAuthenticatedUser",
                JSON.parse(authenticatedUser)
            );
        }
    },
    computed: {
        error() {
            return this.$store.getters.error;
        },
    },
};
</script>
