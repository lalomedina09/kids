<template>
  <section>
    <div v-if="creating">
      <a href="#" class="text-small float-right" @click.prevent="toggleCreateSpeaker">
        <i class="fa fa-times text-light"></i> Cancelar
      </a>
      <div class="clearfix"></div>

      <create-speaker
        v-if="creating"
        @close="creating = false"
        :course="course_id"
        @createdSpeaker="createdSpeaker"
        :orators="orators"
      />
    </div>

    <div v-if="!creating">
      <a href="#" class="text-small float-right" @click.prevent="toggleCreateSpeaker">
        <i class="fa fa-plus text-light"></i> Agregar Expositor
      </a>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(speaker, index) in speakersList">
              <td>{{ index+1 }}</td>
              <td>{{ speaker.name }}</td>
              <td class="text-right">
                <button
                  type="button"
                  class="btn btn-circle btn-danger"
                  @click="deleteSpeaker(speaker.id, index)"
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
import CreateSpeaker from "./CreateSpeaker";
import MessageBag from "../../support/MessageBag";

export default {
  props: {
    speakers: {
      type: Array,
      required: true
    },

    orators: {
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
      speakersList: [],
      creating: false,
      selectedSpeaker: null,
      selectedIndex: null,
      form: {
        speaker_id: null,
        course_id: this.course_id
      }
    };
  },

  mounted() {
    $(document).on("keydown", event => {
      // Close the form when user press the "Escape" key
      if (event.keyCode === 27 || event.key === "Escape") {
        this.creating = false;
      }
    });

    this.speakersList = this.speakers;
  },

  methods: {
    error(key) {
      return this.errors[key] === undefined ? undefined : this.errors[key][0];
    },

    toggleCreateSpeaker() {
      this.creating = !this.creating;
    },

    deleteSpeaker(id, index) {
      this.form.speaker_id = id;
      axios
        .patch("/dashboard/education/courses/speaker", this.form)
        .then(response => {
          this.speakersList.splice(index, 1);
        })
        .catch(error => {
          this.clearLoading();
          this.errors = error.response.data;
        });
    },

    createdSpeaker(value) {
      this.speakersList.push(value);
    }
  },

  components: {
    CreateSpeaker
  }
};
</script>
