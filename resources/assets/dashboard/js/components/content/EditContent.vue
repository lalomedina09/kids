<template>
    <article>
        <div class="row">
            <div class="col-6">
                <div class="form-group" :class="{ 'has-danger': errors.has('address') }">
                    <label>Nombre</label>
                    <input type="text" class="form-control" v-model="content.name" @keydown="errors.clear('name')" placeholder="Introducción a las finanzas">
                    <small :class="{ 'form-control-feedback': errors.has('name') }">{{ errors.get('name') }}</small>
                </div>
            </div>
            <div class="col-6 text-center">
                <div class="form-group">
                <button type="button" class="btn btn-primary" @click="updateContent()" :disabled="loading || ! errors.isEmpty()">Guardar</button>
                </div>
            </div>
        </div>
    </article>
</template>

<script>
    import MessageBag from '../../support/MessageBag'

    export default {

        props: {
            content: {
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

            updateContent() {
                this.loading = true;

                axios.patch('/dashboard/education/courses/material/'+this.content.id, this.content)
                    .then(response => {
                        this.clearLoading();
                        this.$emit('close');
                    })
                    .catch(error => {
                        this.clearLoading();
                        this.errors = new MessageBag(error.response.data.errors);
                    })
            },
        }
    }
</script>
