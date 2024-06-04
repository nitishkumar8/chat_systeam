require('./bootstrap')
import { createApp } from 'vue'
import chatapp from './components/ChatApp'
const app = createApp({})
app.component('hello-world', chatapp)
app.mount('#app')