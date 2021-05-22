<template>
  <q-dialog v-on="$listeners" v-bind="$attrs">
    <q-card style="width: 700px; max-width: 80vw;">
      <q-card-section>
        <div class="text-h6">Editar Usuário</div>
      </q-card-section>

      <q-card-section class="q-pt-none">
        <q-input
          outlined
          type="text"
          v-model="nomeUsuario"
          label="Nome do usuário"
        />
        <q-input
          outlined
          type="email"
          v-model="emailUsuario"
          label="E-mail do usuário"
        />
        <q-select
          outlined
          v-model="tipoUsuario"
          :options="categoriaUsuario"
          label="Tipo de usuário"
        />
      </q-card-section>

      <q-card-actions align="right">
        <q-btn flat label="Sair" color="primary" v-close-popup />
        <q-btn
          label="Editar"
          color="primary"
          v-close-popup
          @click="editarUsuario"
        />
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script>
export default {
  name: "dialogEdicaoPessoa",
  props: {
    usuario: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      categoriaUsuario: ["Admin", "Gerente", "Normal"],
      codigoUsuario: "",
      nomeUsuario: "",
      emailUsuario: "",
      tipoUsuario: ""
    };
  },
  methods: {
    editarUsuario() {
      var obj = {
        codigo: this.codigoUsuario,
        nomeUsuario: this.nomeUsuario,
        emailUsuario: this.emailUsuario,
        categoriaUsuarioInt: this.categoriaUsuarioInt
      };
      this.$emit("editarUsuario", obj);
    }
  },
  computed: {
    categoriaUsuarioInt() {
      var categoriaInt;
      switch (this.tipoUsuario) {
        case "Admin":
          categoriaInt = 1;
          break;
        case "Gerente":
          categoriaInt = 2;
          break;
        default:
          categoriaInt = 3;
          break;
      }
      return categoriaInt;
    }
  },
  watch: {
    usuario(newValue) {
      this.codigoUsuario = newValue.codigo;
      this.nomeUsuario = newValue.nome_usuario;
      this.emailUsuario = newValue.email_usuario;
      this.tipoUsuario =
        newValue.fk_categoria_id === 1
          ? "Admin"
          : newValue.fk_categoria_id === 2
          ? "Gerente"
          : "Normal";
    }
  }
};
</script>
