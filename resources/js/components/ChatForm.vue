<template>
    <div>
        <input v-model="message" @keyup.enter="sendMessage">
        <button @click="sendMessage">Send</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: ''
        };
    },
    methods: {
        sendMessage() {
            this.$emit('messageSent', {
                message: this.message,
                user_id: this.$root.userId,  // Assuming you have userId in the root Vue instance
                receiver_id: 2  // Example receiver_id, adjust as needed
            });
            this.message = '';
        }
    }
};
</script>
