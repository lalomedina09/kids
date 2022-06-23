<template>
    <article>
        <div class="row">
            <div class="col-6">
                <div class="form-group" :class="{ 'has-danger': errors.has('type') }">
                    <label>Tipo de contacto:</label>
                    <select-contact-type v-model="contact.type" @input="errors.clear('type')"></select-contact-type>
                    <small :class="{ 'form-control-feedback': errors.has('type') }">{{ errors.get('type') }}</small>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group" :class="{ 'has-danger': errors.has('name') }">
                    <label>Nombre a mostar</label>
                    <input type="text" class="form-control" v-model="contact.name" @keydown="errors.clear('name')">
                    <small :class="{ 'form-control-feedback': errors.has('name') }">{{ errors.get('name') }}</small>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group" :class="{ 'has-danger': errors.has('address') }">
                    <label>Dirección de contacto</label>
                    <input type="text" class="form-control" v-model="contact.address" @keydown="errors.clear('address')" placeholder="Url/Email/Teléfono">
                    <small class="text-muted">* Puede ser url de cuentas sociales, correo electrónico o número telefónico</small></br>
                    <small :class="{ 'form-control-feedback': errors.has('address') }">{{ errors.get('address') }}</small>
                </div>
            </div>
            <div class="col-6 text-center">
                <div class="form-group">
                <button type="button" class="btn btn-primary" @click="updateContact()" :disabled="loading || ! errors.isEmpty()">Guardar</button>
                </div>
            </div>
        </div>
    </article>
</template>

<script>
    import SelectContactType from './SelectContactType.vue'
    import MessageBag from '../../support/MessageBag'

    export default {

        props: {
            contact: {
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

            updateContact() {
                this.loading = true;

                axios.patch('/dashboard/education/courses/contact/'+this.contact.id, this.contact)
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
            SelectContactType
        }
    }
</script>
