<template>
    <router-link class="btn btn-primary mb-3 float-right font-weight-bold" :to="{ name: 'documents.create'}">New document form</router-link>
    <table class="table table-striped">
        <thead>
        <tr >
            <th scope="col">ID</th>
            <th scope="col">DOCUMENT TITLE</th>
            <th scope="col">CREATED DATE</th>
            <th scope="col">DOCUMENT SIZE</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="document in documents" :key="document.id">
            <th scope="row">{{document.id}}</th>
            <td>{{document.document_name}}</td>
            <td>{{document.created_at}}</td>
            <td>{{document.field_count}}</td>
            <td><router-link :to="{ name: 'documents.show', params: { id:document.id }}">Document preview</router-link></td>
        </tr>
        </tbody>
    </table>
</template>

<script>
import useDocuments from "../../composables/documents";
import { onMounted } from "vue";

export default {

    setup(){
        const { documents, getDocuments } = useDocuments()

        onMounted(getDocuments())

        return{
            documents
        }
    }
}
</script>
