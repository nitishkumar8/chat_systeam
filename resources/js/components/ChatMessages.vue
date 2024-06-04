<template>
    <div>
        <div v-for="message in messages" :key="message.id">
            <strong>{{ message.user.name }}</strong>: {{ message.message }}
        </div>
    </div>
</template>

<script>
export default {
    props: ['messages']
};
</script>
