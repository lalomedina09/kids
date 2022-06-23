<template>
    <select class="form-control cs-select cs-skin-elastic" @change="onChange">
        <option value="" disabled selected>Tipo de extra</option>
        <option v-for="tipo in tipos" :value="tipo.value" :selected="tipo.value == value">{{ tipo.label }}</option>
    </select>
</template>

<script>
export default {
    props: {
        value: {
            default: ''
        },
    },

    data() {
        return {
            tipos: []
        }
    },

    beforeMount() {
        axios.get('/dashboard/education/courses/material')
            .then(response => {
                this.tipos = response.data;
            })
    },

    methods: {
        onChange(event) {
            this.$emit('input', event.target.value);
        },
    }
}
</script>
