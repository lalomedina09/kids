<template>
    <article>
        <div class="row">
            <div class="col-6">
                <div class="form-group" :class="{ 'has-danger': errors.has('type') }">
                    <label>Tipo:</label>
                    <select-extra-type v-model="extra.type" @input="errors.clear('type')"></select-extra-type>
                    <small :class="{ 'form-control-feedback': errors.has('type') }">{{ errors.get('type') }}</small>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group" :class="{ 'has-danger': errors.has('address') }">
                    <label>Nombre</label>
                    <input type="text" class="form-control" v-model="extra.name" @keydown="errors.clear('name')" placeholder="Introducción a las finanzas">
                    <small :class="{ 'form-control-feedback': errors.has('name') }">{{ errors.get('name') }}</small>
                </div>
            </div>
            <div class="col-6 text-center">
                <div class="form-group">
                <button type="button" class="btn btn-primary" @click="updateExtra()" :disabled="loading || ! errors.isEmpty()">Guardar</button>
                </div>
            </div>
        </div>
    </article>
</template>

<script>
    import SelectExtraType from './SelectExtraType.vue'
    import MessageBag from '../../support/MessageBag'

    export default {

        props: {
            extra: {
                type: Object,
                required: true
            }
        },

        data() {
            return {
                loading: false,
                errors: new MessageBag(),
            }
        },

        methods: {

            clearLoading() {
                this.loading = false;
            },

            error(key) {
               return this.errors[key] === undefined ? undefined : this.errors[key][0];
            },

            clearErrors() {
                this.errors = {};
            },

            updateExtra() {
                this.loading = true;

                axios.patch('/dashboard/education/courses/material/'+this.extra.id, this.extra)
                    .then(response => {
                        this.clearLoading();
                        this.$emit('close');
                    })
                    .catch(error => {
                        this.clearLoading();
                        this.errors = new MessageBag(error.response.data.errors);
                    })
            },
        },

        components: {
            SelectExtraType
        }
    }
</script>
