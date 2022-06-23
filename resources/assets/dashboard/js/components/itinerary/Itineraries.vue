<template>
  <section>
    <div v-if="editing">
      <a href="#" class="text-small float-right" @click.prevent="toggleEditItinerary">
        <i class="fa fa-times text-light"></i> Cancelar
      </a>
      <div class="clearfix"></div>

      <edit-itinerary v-if="editing" @close="editing = false" :itinerary="selectedItinerary"/>
    </div>

    <div v-if="creating">
      <a href="#" class="text-small float-right" @click.prevent="toggleCreateItinerary">
        <i class="fa fa-times text-light"></i> Cancelar
      </a>
      <div class="clearfix"></div>

      <create-itinerary
        v-if="creating"
        @close="creating = false"
        :course="course_id"
        @createdItinerary="createdItinerary"
      />
    </div>

    <div v-if="(!editing) && (!creating)">
      <a href="#" class="text-small float-right" @click.prevent="toggleCreateItinerary">
        <i class="fa fa-plus text-light"></i> Agregar Elemento
      </a>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Inicio</th>
              <th>Fin</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(itinerary, index) in itinerariesList">
              <td>{{ index+1 }}</td>
              <td>{{ itinerary.name }}</td>
              <td>{{ itinerary.start }}</td>
              <td>{{ itinerary.end }}</td>
              <td class="text-right">
                <button
                  type="button"
                  class="btn btn-circle btn-primary"
                  @click="editItinerary(itinerary, index)"
                >
                  <i class="fa fa-pencil"></i>
                </button>
                <button
                  type="button"
                  class="btn btn-circle btn-danger"
                  @click="deleteItinerary(itinerary.id, index)"
                >
                  <i class="fa fa-times"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- .table-responsive -->
    </div>
  </section>
</template>

<script>
import EditItinerary from "./EditItinerary";
import CreateItinerary from "./CreateItinerary";
import MessageBag from "../../support/MessageBag";

export default {
  props: {
    itineraries: {
      type: Array,
      required: true
    },
    course_id: {
      type: Number,
      required: true
    }
  },

  data() {
    return {
      itinerariesList: [],
      editing: false,
      creating: false,
      selectedItinerary: null,
      selectedIndex: null
    };
  },

  mounted() {
    $(document).on("keydown", event => {
      // Close the form when user press the "Escape" key
      if (event.keyCode === 27 || event.key === "Escape") {
        this.editing = false;
        this.creating = false;
      }
    });

    this.itinerariesList = this.itineraries;
  },

  methods: {
    error(key) {
      return this.errors[key] === undefined ? undefined : this.errors[key][0];
    },

    toggleEditItinerary() {
      this.editing = !this.editing;
    },

    toggleCreateItinerary() {
      this.creating = !this.creating;
    },

    editItinerary(itinerary, index) {
      this.editing = true;
      this.selectedItinerary = itinerary;
      this.selectedIndex = index;
    },

    deleteItinerary(id, index) {
      axios
        .delete("/dashboard/education/courses/itinerary/" + id)
        .then(response => {
          this.itinerariesList.splice(index, 1);
        })
        .catch(error => {
          this.clearLoading();
          this.errors = error.response.data;
        });
    },

    createdItinerary(value) {
      this.itinerariesList.push(value);
    }
  },

  components: {
    EditItinerary,
    CreateItinerary
  }
};
</script>
