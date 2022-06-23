<template>
  <section>
    <div v-if="editing">
      <a href="#" class="text-small float-right" @click.prevent="toggleEditContent">
        <i class="fa fa-times text-light"></i> Cancelar
      </a>
      <div class="clearfix"></div>

      <edit-content v-if="editing" @close="editing = false" :content="selectedContent"/>
    </div>

    <div v-if="creating">
      <a href="#" class="text-small float-right" @click.prevent="toggleCreateContent">
        <i class="fa fa-times text-light"></i> Cancelar
      </a>
      <div class="clearfix"></div>

      <create-content
        v-if="creating"
        @close="creating = false"
        :course="course_id"
        @createdContent="createdContent"
      />
    </div>

    <div v-if="(!editing) && (!creating)">
      <a href="#" class="text-small float-right" @click.prevent="toggleCreateContent">
        <i class="fa fa-plus text-light"></i> Agregar Tema
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
            <tr v-for="(content, index) in contentsList">
              <td>{{ index+1 }}</td>
              <td>
                <img :src="'/images/education/'+content.type+'.png'" style="width: 30px;">
              </td>
              <td>{{ content.name }}</td>
              <td class="text-right">
                <button
                  type="button"
                  class="btn btn-circle btn-primary"
                  @click="editContent(content, index)"
                >
                  <i class="fa fa-pencil"></i>
                </button>
                <button
                  type="button"
                  class="btn btn-circle btn-danger"
                  @click="deleteContent(content.id, index)"
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
import EditContent from "./EditContent";
import CreateContent from "./CreateContent";
import MessageBag from "../../support/MessageBag";

export default {
  props: {
    contents: {
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
      contentsList: [],
      editing: false,
      creating: false,
      selectedContent: null,
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

    this.contentsList = this.contents;
  },

  methods: {
    error(key) {
      return this.errors[key] === undefined ? undefined : this.errors[key][0];
    },

    toggleEditContent() {
      this.editing = !this.editing;
    },

    toggleCreateContent() {
      this.creating = !this.creating;
    },

    editContent(content, index) {
      this.editing = true;
      this.selectedContent = content;
      this.selectedIndex = index;
    },

    deleteContent(id, index) {
      axios
        .delete("/dashboard/education/courses/material/" + id)
        .then(response => {
          this.contentsList.splice(index, 1);
        })
        .catch(error => {
          this.clearLoading();
          this.errors = error.response.data;
        });
    },

    createdContent(value) {
      this.contentsList.push(value);
    }
  },

  components: {
    EditContent,
    CreateContent
  }
};
</script>
