<template>
    <div class="space-y-4 rounded-md shadow-sm">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Document title</label>
            <div class="mt-1">
                <input type="text" name="name" id="name"
                       class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="document.document_name">
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Form data json</label>
            <div class="mt-1">
                <input type="text" name="email" id="email"
                       class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="document.fields">
            </div>
        </div>
    </div>
</template>

<script>
import useDocuments from "../../composables/documents";
import {onMounted} from "vue";


export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },
    setup(props){

        const { document, getDocument } = useDocuments()

        onMounted(() => {
            getDocument(props.id)
        })


        return{
            document
        }
    }
}
</script>
