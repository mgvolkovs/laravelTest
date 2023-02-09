import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from "vue-router";

export default function useDocuments() {
    const documents = ref([])

    const document = ref([])

    const router = useRouter();

    const errors = ref('');

    const getDocument = async (id) => {
        let response = await axios.get('/api/v1/document/'+id)
        document.value = response.data.data;
    }

    const getDocuments = async () => {
        let response = await axios.get('/api/v1/documents')
        documents.value = response.data.data;
    }

    const storeDocument = async (data) => {
        errors.value = ''
        try{
            await axios.post('/api/v1/documents/create', data)
            await router.push({ name: 'documents.index' })
        }
        catch (e) {
            if(e.response.status === 422){
                errors.value=e.response.data.errors;
            }
        }

    }

    return {
        documents,
        document,
        errors,
        storeDocument,
        getDocuments,
        getDocument
    }
}
