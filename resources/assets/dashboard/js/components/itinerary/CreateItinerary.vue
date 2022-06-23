<template>
  <article>
    <div class="row">
      <div class="col-6">
        <div class="form-group" :class="{ 'has-danger': errors.has('name') }">
          <label>Nombre</label>
          <input
            type="text"
            class="form-control"
            v-model="form.name"
            @keydown="errors.clear('name')"
            placeholder="Introducción a las finanzas"
          >
          <small :class="{ 'form-control-feedback': errors.has('name') }">{{ errors.get('name') }}</small>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group" :class="{ 'has-danger': errors.has('start') }">
          <label>Inicio</label>
          <input
            type="datetime"
            id="start_date"
            class="form-control datetimepicker-input"
            placeholder="p. ej. 2000-01-31 12:00:59"
            data-target="#start_date"
            data-toggle="datetimepicker"
            v-model="form.start"
            @keydown="errors.clear('start')"
          >
          <small :class="{ 'form-control-feedback': errors.has('start') }">{{ errors.get('start') }}</small>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group" :class="{ 'has-danger': errors.has('end') }">
          <label>Fin</label>
          <input
            type="datetime"
            id="end_date"
            class="form-control datetimepicker-input"
            placeholder="p. ej. 2000-01-31 12:00:59"
            data-target="#end_date"
            data-toggle="datetimepicker"
            v-model="form.end"
            @keydown="errors.clear('end')"
          >
          <small :class="{ 'form-control-feedback': errors.has('end') }">{{ errors.get('end') }}</small>
        </div>
      </div>
      <div class="col-6 text-center">
        <div class="form-group">
          <button
            type="button"
            class="btn btn-primary"
            @click="createdItinerary()"
            :disabled="loading || ! errors.isEmpty()"
          >Guardar</button>
        </div>
      </div>
    </div>
  </article>
</template>

<script>
import MessageBag from "../../support/MessageBag";
import initDatePicker from "@/utils/DatePicker";

export default {
  props: {
    course: {
      type: Number,
      required: true
    }
  },

  data() {
    return {
      loading: false,
      errors: new MessageBag(),
      form: {
        name: "",
        start: null,
        end: null,
        course_id: this.course
      }
    };
  },

  mounted() {
    initDatePicker('input[type="datetime"]', "YYYY-MM-DD HH:mm:ss");
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

    createdItinerary() {
      this.loading = true;
      this.form.start = $("#start_date").val();
      this.form.end = $("#end_date").val();

      axios
        .post("/dashboard/education/courses/itinerary", this.form)
        .then(response => {
          this.clearLoading();
          this.$emit("createdItinerary", response.data.itinerary);
          this.$emit("close");
        })
        .catch(error => {
          this.clearLoading();
          this.errors = new MessageBag(error.response.data.errors);
        });
    }
  },

  watch: {
    "form.start": function(value, oldValue) {
      this.errors.clear("start");
    },
    "form.end": function(value, oldValue) {
      this.errors.clear("end");
    }
  }
};
</script>
