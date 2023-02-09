require('./bootstrap');


import { createApp } from "vue";
import router from './router';
import DocumentsIndex from './components/documents/DocumentsIndex'
import DocumentsCreate from './components/documents/DocumentsCreate'
import DocumentsShow from './components/documents/DocumentsShow'

createApp({
    components: {
        DocumentsIndex,
        DocumentsCreate,
        DocumentsShow
    }
}).use(router).mount('#app')
