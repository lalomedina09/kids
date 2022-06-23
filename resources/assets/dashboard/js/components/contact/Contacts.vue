<template>
  <section>
    <div v-if="editing">
      <a href="#" class="text-small float-right" @click.prevent="toggleEditContact">
        <i class="fa fa-times text-light"></i> Cancelar
      </a>
      <div class="clearfix"></div>

      <edit-contact v-if="editing" @close="editing = false" :contact="selectedContact"/>
    </div>

    <div v-if="creating">
      <a href="#" class="text-small float-right" @click.prevent="toggleCreateContact">
        <i class="fa fa-times text-light"></i> Cancelar
      </a>
      <div class="clearfix"></div>

      <create-contact
        v-if="creating"
        @close="creating = false"
        :course="course_id"
        @createdContact="createdContact"
      />
    </div>

    <div v-if="(!editing) && (!creating)">
      <a href="#" class="text-small float-right" @click.prevent="toggleCreateContact">
        <i class="fa fa-plus text-light"></i> Agregar contacto
      </a>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Tipo de contacto</th>
              <th>Nombre</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(contact, index) in contactsList">
              <td>{{ index+1 }}</td>
              <td>
                <i :class="'fa fa-'+contact.type+' text-light'"></i>
                {{ contact.type }}
              </td>
              <td>{{ contact.name }}</td>
              <td class="text-right">
                <button
                  type="button"
                  class="btn btn-circle btn-primary"
                  @click="editContact(contact, index)"
                >
                  <i class="fa fa-pencil"></i>
                </button>
                <button
                  type="button"
                  class="btn btn-circle btn-danger"
                  @click="deleteContact(contact.id, index)"
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
import EditContact from "./EditContact";
import CreateContact from "./CreateContact";
import MessageBag from "../../support/MessageBag";

export default {
  props: {
    contacts: {
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
      contactsList: [],
      editing: false,
      creating: false,
      selectedContact: null,
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

    this.contactsList = this.contacts;
  },

  methods: {
    error(key) {
      return this.errors[key] === undefined ? undefined : this.errors[key][0];
    },

    toggleEditContact() {
      this.editing = !this.editing;
    },

    toggleCreateContact() {
      this.creating = !this.creating;
    },

    editContact(contact, index) {
      this.editing = true;
      this.selectedContact = contact;
      this.selectedIndex = index;
    },

    deleteContact(id, index) {
      axios
        .delete("/dashboard/education/courses/contact/" + id)
        .then(response => {
          this.contactsList.splice(index, 1);
        })
        .catch(error => {
          this.clearLoading();
          this.errors = error.response.data;
        });
    },

    createdContact(value) {
      this.contactsList.push(value);
    }
  },

  components: {
    EditContact,
    CreateContact
  }
};
</script>
