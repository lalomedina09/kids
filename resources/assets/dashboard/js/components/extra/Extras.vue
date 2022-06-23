<template>
  <section>
    <div v-if="editing">
      <a href="#" class="text-small float-right" @click.prevent="toggleEditExtra">
        <i class="fa fa-times text-light"></i> Cancelar
      </a>
      <div class="clearfix"></div>

      <edit-extra v-if="editing" @close="editing = false" :extra="selectedExtra"/>
    </div>

    <div v-if="creating">
      <a href="#" class="text-small float-right" @click.prevent="toggleCreateExtra">
        <i class="fa fa-times text-light"></i> Cancelar
      </a>
      <div class="clearfix"></div>

      <create-extra
        v-if="creating"
        @close="creating = false"
        :course="course_id"
        @createdExtra="createdExtra"
      />
    </div>

    <div v-if="(!editing) && (!creating)">
      <a href="#" class="text-small float-right" @click.prevent="toggleCreateExtra">
        <i class="fa fa-plus text-light"></i> Agregar Extra
      </a>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Tipo</th>
              <th>Nombre</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(extra, index) in extrasList">
              <td>{{ index+1 }}</td>
              <td>
                <img :src="'/images/education/'+extra.type+'.png'" style="width: 30px;">
              </td>
              <td>{{ extra.name }}</td>
              <td class="text-right">
                <button
                  type="button"
                  class="btn btn-circle btn-primary"
                  @click="editExtra(extra, index)"
                >
                  <i class="fa fa-pencil"></i>
                </button>
                <button
                  type="button"
                  class="btn btn-circle btn-danger"
                  @click="deleteExtra(extra.id, index)"
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
import EditExtra from "./EditExtra";
import CreateExtra from "./CreateExtra";
import MessageBag from "../../support/MessageBag";

export default {
  props: {
    extras: {
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
      extrasList: [],
      editing: false,
      creating: false,
      selectedExtra: null,
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

    this.extrasList = this.extras;
  },

  methods: {
    error(key) {
      return this.errors[key] === undefined ? undefined : this.errors[key][0];
    },

    toggleEditExtra() {
      this.editing = !this.editing;
    },

    toggleCreateExtra() {
      this.creating = !this.creating;
    },

    editExtra(extra, index) {
      this.editing = true;
      this.selectedExtra = extra;
      this.selectedIndex = index;
    },

    deleteExtra(id, index) {
      axios
        .delete("/dashboard/education/courses/material/" + id)
        .then(response => {
          this.extrasList.splice(index, 1);
        })
        .catch(error => {
          this.clearLoading();
          this.errors = error.response.data;
        });
    },

    createdExtra(value) {
      this.extrasList.push(value);
    }
  },

  components: {
    EditExtra,
    CreateExtra
  }
};
</script>
