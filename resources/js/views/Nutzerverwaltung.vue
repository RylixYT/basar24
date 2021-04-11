<template>
  <div>
    <!-- Page Header -->
    <div class="page-header mb-4">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Nutzerverwaltung</h2>
      </div>
    </div>
    <!-- Forms -->
    <section class="no-padding-top">
      <div class="container-fluid">
        <!-- Basic Form-->
        <div class="col-lg-12">
          <div class="block">
            <div class="title">
              <strong class="d-block">Registrierungshash</strong>
              <span class="d-block">
                Mit diesem Hash können sich Leute registrieren. Der Hash
                wechselt nach jeder Registrierung. Geben Sie diesen Hash an
                keine dritten Personen weiter, die sich hier nicht registrieren
                sollen.
              </span>
            </div>
            <div class="block-body">
              <div class="form-group">
                <label class="form-control-label">Registrierungshash</label>
                <input
                  class="form-control"
                  disabled
                  :value="users[0].nextHash"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="block">
            <div class="title">
              <strong>Nutzer</strong>
              <span class="d-block">
                Zum editieren einfach in die Tabellenzelle tippen.
              </span>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>StateV Mail</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(nutzer, index) in users" v-bind:key="index">
                    <th>{{ index + 1 }}</th>
                    <td>
                      <input
                        type="text"
                        v-model="nutzer.name"
                        @input="update(nutzer)"
                      />
                    </td>
                    <td>{{ nutzer.email }}</td>
                    <td>
                      <button
                        v-if="nutzer.email != 'Sebastian_Schindler@statev.de'"
                        class="btn btn-danger"
                        v-on:click="deleteNutzer(nutzer.id)"
                      >
                        Delete
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  props: {
    user: "",
    users: "",
  },
  data() {
    return {
      timeout: "",
    };
  },
  methods: {
    update(user) {
      this.timeout = "";
      this.timeout = setTimeout(() => {
        this.data = {
          name: user.name,
          _token: this.csrf,
          _method: "put",
        };
        axios
          .post("api/user/" + user.id + "?api_token=Backend", this.data)
          .then((res) => {
            if (this.user.id == user.id) {
              location.reload();
            }
          })
          .catch((err) => {
            console.log(err);
          });
      }, 1500);
    },
    deleteNutzer(id) {
      axios
        .post("api/user/" + id + "/delete?api_token=Backend", {
          _method: "delete",
          _token: this.csrf,
        })
        .then((res) => {
          location.reload();
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style scoped>
td input {
  all: unset;
  width: 100%;
}
</style>
