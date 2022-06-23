<template>
    <article>
        <div class="row">
            <div class="col-6">
                <div class="form-group" :class="{ 'has-danger': errors.has('type') }">
                    <label>Tipo:</label>
                    <select-extra-type v-model="form.type" @input="errors.clear('type')"></select-extra-type>
                    <small :class="{ 'form-control-feedback': errors.has('type') }">{{ errors.get('type') }}</small>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group" :class="{ 'has-danger': errors.has('name') }">
                    <label>Nombre</label>
                    <input type="text" class="form-control" v-model="form.name" @keydown="errors.clear('name')" placeholder="Introducción a las finanzas">
                    <small :class="{ 'form-control-feedback': errors.has('name') }">{{ errors.get('name') }}</small>
                </div>
            </div>
            <div class="col-6 text-center">
                <div class="form-group">
                <button type="button" class="btn btn-primary" @click="createExtra()" :disabled="loading || ! errors.isEmpty()">Guardar</button>
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
            course: {
                type: Number,
                required: true
            },
        },

        data() {
            return {
                loading: false,
                errors: new MessageBag(),
                form: {
                    name : '',
                    type: '',
                    course_id: this.course
                }
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

            createExtra() {
                this.loading = true;

                axios.post('/dashboard/education/courses/material', this.form)
                    .then(response => {
                        this.clearLoading();
                        this.$emit('createdExtra', response.data.material);
                        this.$emit('close');
                    })
                    .catch(error => {
                        this.clearLoading();
                        this.errors = new MessageBag(error.response.data.errors);
                    });
            },
        },

        components: {
            SelectExtraType
        }
    }
</script>
