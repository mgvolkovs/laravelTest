<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6 m-auto" style="width: 20%" @submit.prevent="saveDocument">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Document title</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.document_name">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Form data json</label>
                <div class="mt-1">
                    <input type="text" name="email" id="email"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.form_values">
                </div>
            </div>
        </div>

        <button type=""
                class="btn btn-outline-dark float-left">
            Add more
        </button>

        <button type="submit"
                class="btn btn-primary float-right">
            Save
        </button>
    </form>
</template>

<script>
import {onMounted, reactive} from 'vue';
import useDocuments from "../../composables/documents";

export default {

    setup(){
        const form = reactive({
            'document_name': '',
            'form_values': '',
        })

        onMounted(() => {
            form.document_name='Testa dokuments'
                form.form_values='[\n' +
                    '{\n' +
                    '"field_seq": "10",\n' +
                    '"is_mandatory": 1,\n' +
                    '"field_type": 2,\n' +
                    '"field_name": "Input field name 1",\n' +
                    '"select_values": [\n' +
                    '{\n' +
                    '"value": true,\n' +
                    '"label": "Agree"\n' +
                    '},\n' +
                    '{\n' +
                    '"value": false,\n' +
                    '"label": "Disagree"\n' +
                    '}\n' +
                    ']\n' +
                    '},\n' +
                    '{\n' +
                    '"field_seq": "20",\n' +
                    '"is_mandatory": 1,\n' +
                    '"field_type": 2,\n' +
                    '"field_name": "Input field name 2",\n' +
                    '"select_values": [\n' +
                    '{\n' +
                    '"value": true,\n' +
                    '"label": "Agree"\n' +
                    '},\n' +
                    '{\n' +
                    '"value": false,\n' +
                    '"label": "Disagree"\n' +
                    '}\n' +
                    ']\n' +
                    '}\n' +
                    ']'
        })

        const { errors, storeDocument } = useDocuments()

        const saveDocument = async () => {
            await storeDocument({...form});
        }

        return{
            form,
            errors,
            saveDocument
        }
    }
}
</script>
