<template>
    <div class="app-container">
        <h1>User Login</h1>
        <form @submit.prevent="login">
            <div>
                <label for="email">Email:</label>
                <input class="form-control form-control-lg" style="background-color:yellow" type="email" v-model="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" v-model="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            email: '',
            password: ''
        };
    },
    methods: {
        async login() {
            try {
                const response = await axios.post('http://localhost:8000/api/login', {
                    email: this.email,
                    password: this.password
                });
                console.log(response.data);
            } catch (error) {
                console.error(error.response.data);
            }
        }
    }
};
</script>

<style scoped>
.login {
    max-width: 300px;
    margin: auto;
}
</style>
