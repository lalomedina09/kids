<template>
  <article>
    <div class="row">
      <div class="col-6">
        <div class="form-group" :class="{ 'has-danger': errors.has('address') }">
          <label>Nombre</label>
          <input
            type="text"
            class="form-control"
            v-model="itinerary.name"
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
            v-model="itinerary.start"
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
            v-model="itinerary.end"
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
            @click="updateItinerary()"
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
    itinerary: {
      type: Object,
      required: true
    }
  },

  data() {
    return {
      loading: false,
      errors: new MessageBag()
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

    updateItinerary() {
      this.loading = true;
      this.itinerary.start = $("#start_date").val();
      this.itinerary.end = $("#end_date").val();

      axios
        .patch(
          "/dashboard/education/courses/itinerary/" + this.itinerary.id,
          this.itinerary
        )
        .then(response => {
          this.clearLoading();
          this.$emit("close");
        })
        .catch(error => {
          this.clearLoading();
          this.errors = new MessageBag(error.response.data.errors);
        });
    }
  },

  watch: {
    "itinerary.start": function(value, oldValue) {
      this.errors.clear("start");
    },
    "itinerary.end": function(value, oldValue) {
      this.errors.clear("end");
    }
  }
};
</script>
