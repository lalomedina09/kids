<template>
    <article>
        <div class="row">
            <div class="col-6">
                <div class="form-group" :class="{ 'has-danger': errors.has('type') }">
                    <label>Expositor:</label>
                    <select-speaker-type :orators="orators" v-model="form.speaker_id" @input="errors.clear('speaker_id')"></select-speaker-type>
                    <small :class="{ 'form-control-feedback': errors.has('speaker_id') }">{{ errors.get('speaker_id') }}</small>
                </div>
            </div>
            <div class="col-6 text-center">
                <div class="form-group">
                <button type="button" class="btn btn-primary" @click="createSpeaker()" :disabled="loading || ! errors.isEmpty()">Guardar</button>
                </div>
            </div>
        </div>
    </article>
</template>

<script>
    import SelectSpeakerType from './SelectSpeakerType.vue'
    import MessageBag from '../../support/MessageBag'

    export default {

        props: {
            course: {
                type: Number,
                required: true
            },

            orators: {
                type: Array,
                required: true
            },
        },

        data() {
            return {
                loading: false,
                errors: new MessageBag(),
                form: {
                    speaker_id: '',
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

            createSpeaker() {
                this.loading = true;

                axios.post('/dashboard/education/courses/speaker', this.form)
                    .then(response => {
                        this.clearLoading();
                        this.$emit('createdSpeaker', response.data.speaker);
                        this.$emit('close');
                    })
                    .catch(error => {
                        this.clearLoading();
                        this.errors = new MessageBag(error.response.data.errors);
                    });
            },
        },

        components: {
            SelectSpeakerType
        }
    }
</script>
