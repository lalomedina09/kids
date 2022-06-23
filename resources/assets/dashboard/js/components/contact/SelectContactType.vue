<template>
    <select class="form-control cs-select cs-skin-elastic" @change="onChange">
        <option value="" disabled selected>Tipo de contacto</option>
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

    computed: {
        tipos() {
            return [
                { value: 'facebook', label: 'Facebook' },
                { value: 'google-plus', label: 'Google +' },
                { value: 'instagram', label: 'Instagram' },
                { value: 'linkedin', label: 'LinkedIn' },
                { value: 'mail', label: 'Email' },
                { value: 'pinterest', label: 'Pinterest' },
                { value: 'phone', label: 'Teléfono' },
                { value: 'skype', label: 'Skype' },
                { value: 'twitter', label: 'Twitter' },
                { value: 'youtube', label: 'You Tube' },
                { value: 'globe', label: 'Sitio web' },
            ];
        }
    },

    methods: {
        onChange(event) {
            this.$emit('input', event.target.value);
        },
    }
}
</script>
