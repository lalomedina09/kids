<template>
    <select class="form-control cs-select cs-skin-elastic" @change="onChange">
        <option value="" disabled selected>Tipo de extra</option>
        <option v-for="tipo in orators" :value="tipo.id" :selected="tipo.id == value">{{ tipo.name }}</option>
    </select>
</template>

<script>
export default {
    props: {
        value: {
            default: ''
        },

        orators: {
            type: Array,
            required: true
        },
    },

    methods: {
        onChange(event) {
            this.$emit('input', event.target.value);
        },
    }
}
</script>
