<template>
  <q-page class="column q-ml-xl q-mr-xl">
    <header>
      <h6>
        Aqui você pode encontrar a lista de pessoas cadastradas no sistema
      </h6>
    </header>

    <section class="full-width">
      <q-table
        title="Usuários"
        :data="data"
        :columns="columns"
        row-key="name"
      />
    </section>
  </q-page>
</template>

<script>
export default {
  name: "PageIndex",
  data() {
    return {
      columns: [
        {
          name: "codigo",
          required: true,
          label: "Código",
          sortable: true,
          field: "codigo"
        },
        {
          name: "nome_usuario",
          required: true,
          label: "Nome usuário",
          sortable: true,
          field: "nome_usuario"
        },
        {
          name: "email_usuario",
          required: true,
          label: "E-mail usuário",
          sortable: true,
          field: "email_usuario"
        },
        {
          name: "tipo_de_usuario",
          required: true,
          label: "Tipo de usuário",
          sortable: true,
          field: row => this.verificarTipoDeUsuario(row.fk_categoria_id)
        }
      ],
      data: [
        {
          codigo: "1",
          nome_usuario: "João Victor Silva Soares",
          email_usuario: "jovictors.soares@gmail.com",
          fk_categoria_id: 1
        }
      ]
    };
  },
  methods: {
    verificarTipoDeUsuario(idTipo) {
      let stringTipo;
      switch (idTipo) {
        case 1:
          stringTipo = "Admin";
          break;
        case 2:
          stringTipo = "Gerente";
          break;
        default:
          stringTipo = "Normal"
          break;
      }
      return stringTipo
    }
  },
};
</script>
