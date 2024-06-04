<template>
    <div>
        <h1>Chat System</h1>
        <chat-messages :messages="messages"></chat-messages>
        <chat-form @messageSent="addMessage"></chat-form>
    </div>
</template>

<script>
import axios from 'axios';
import ChatMessages from './ChatMessages.vue';
import ChatForm from './ChatForm.vue';

export default {
    components: {
        ChatMessages,
        ChatForm
    },
    data() {
        return {
            messages: []
        };
    },
    mounted() {
        this.fetchMessages();
    },
    methods: {
        fetchMessages() {
            const token ='4|qPlXz70rfjgGIQttVS8voZnz1l9NhnDvME2uGHzn289d46f1';
             //const header = `Authorization: Bearer 4|qPlXz70rfjgGIQttVS8voZnz1l9NhnDvME2uGHzn289d46f1`;
            const header={
                    // 'Content-Type':'application/json',
                    // 'Acess-Control-Allow-Origin':'*',
                    'Authorization':`Bearer ${token}`,
                    // 'Accept': "application/json"
        }
            // return axios.get(URLConstants.USER_URL, { headers: { header } });
            axios.get('/api/chats',{ headers:  header  }).then(response => {
                this.messages = response.data;
            });
        },
        addMessage(message) {
            const token ='4|qPlXz70rfjgGIQttVS8voZnz1l9NhnDvME2uGHzn289d46f1';
             //const header = `Authorization: Bearer 4|qPlXz70rfjgGIQttVS8voZnz1l9NhnDvME2uGHzn289d46f1`;
            const header={
                    // 'Content-Type':'application/json',
                    // 'Acess-Control-Allow-Origin':'*',
                    'Authorization':`Bearer ${token}`,
                    // 'Accept': "application/json"
        }
            this.messages.push(message);
            axios.post('/api/chats', message,{ headers:  header  }).then(response => {
                console.log(response.data);
            });
        }
    }
};
</script>
