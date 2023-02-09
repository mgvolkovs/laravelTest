import { createRouter, createWebHistory } from "vue-router";

import DocumentsIndex from '../components/documents/DocumentsIndex'
import DocumentsCreate from "../components/documents/DocumentsCreate";
import DocumentsShow from "../components/documents/DocumentsShow";

const routes = [
    {
        path: '/',
        name: 'documents.index',
        component: DocumentsIndex
    }, {
        path: '/create',
        name: 'documents.create',
        component: DocumentsCreate
    },
    {
        path: '/show/:id',
        name: 'documents.show',
        component: DocumentsShow,
        props: true
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
