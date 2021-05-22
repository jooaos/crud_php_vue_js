<template>
  <q-page class="column q-ml-xl q-mr-xl q-mb-xl">
    <header>
      <h6>
        Lista de pessoas cadastradas no sistema
      </h6>
    </header>

    <section class="full-width">
      <q-table
        title="Pessoas"
        :data="pessoas"
        :columns="columns"
        row-key="name"
      >
        <template v-slot:top>
          <q-btn
            color="primary"
            label="Adicionar pessoa"
            @click="dialogAdicionarPessoa = true"
          />
        </template>

        <template v-slot:header="props">
          <q-tr :props="props">
            <q-th auto-width />
            <q-th v-for="col in props.cols" :key="col.name" :props="props">
              {{ col.label }}
            </q-th>
          </q-tr>
        </template>

        <template v-slot:body="props">
          <q-tr :props="props">
            <q-td auto-width>
              <q-btn
                size="sm"
                color="negative"
                class="q-mx-sm"
                @click="deletePessoa(props.row.codigo)"
                round
                dense
                icon="delete"
              />
              <q-btn
                size="sm"
                color="info"
                class="q-mx-sm"
                @click="selecionarPessoaParaEdicao(props.row.codigo)"
                round
                dense
                icon="visibility"
              />
            </q-td>
            <q-td v-for="col in props.cols" :key="col.name" :props="props">
              {{ col.value }}
            </q-td>
          </q-tr>
        </template>
      </q-table>
    </section>

    <dialog-edicao-pessoa
      v-model="dialogEdicaoPessoa"
      :usuario="pessoaSelecionadaParaEdicao"
      @editarUsuario="editarPessoa"
    />

    <dialog-adicionar-pessoa
      v-model="dialogAdicionarPessoa"
      @adicionarUsuario="adicionarPessoa"
    />
  </q-page>
</template>

<script>
import { api } from "boot/axios";
import dialogEdicaoPessoa from "../components/dialogEdicaoPessoa.vue";
import DialogAdicionarPessoa from "../components/dialogAdicionarPessoa.vue";

export default {
  components: { dialogEdicaoPessoa, DialogAdicionarPessoa },
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
      pessoas: [],
      pessoaSelecionadaParaEdicao: {},
      dialogEdicaoPessoa: false,
      dialogAdicionarPessoa: false
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
          stringTipo = "Normal";
          break;
      }
      return stringTipo;
    },
    async getUsers() {
      try {
        const response = await api.get("/api/pessoas");
        this.pessoas = response.data;
      } catch (error) {
        if (error.response.status === 404) {
          this.$q.notify({
            color: "negative",
            position: "bottom",
            message: "A requisição solicitada não foi encontrada",
            icon: "report_problem"
          });
        } else {
          this.$q.notify({
            color: "negative",
            position: "bottom",
            message: "Erro",
            icon: "report_problem"
          });
        }
      }
    },
    deletePessoa(idPessoa) {
      api
        .delete(`/api/pessoas/${idPessoa}`)
        .then(response => {
          this.pessoas = this.pessoas.filter(element => {
            return element.codigo != idPessoa;
          });
          this.$q.notify({
            color: "positive",
            position: "bottom",
            timeout: 1000,
            message: response.data,
            icon: "done"
          });
        })
        .catch(error => {
          if (error.response.status === 404) {
            this.$q.notify({
              color: "negative",
              position: "bottom",
              timeout: 1500,
              message: "Usuário não foi encontrado",
              icon: "report_problem"
            });
          } else {
            this.$q.notify({
              color: "negative",
              position: "bottom",
              timeout: 1500,
              message: "Erro",
              icon: "report_problem"
            });
          }
        });
    },
    selecionarPessoaParaEdicao(idPessoa) {
      api
        .get(`api/pessoas/${idPessoa}`)
        .then(response => {
          this.pessoaSelecionadaParaEdicao = response.data;
          this.dialogEdicaoPessoa = true;
        })
        .catch(error => {
          if (error.response.status === 404) {
            this.$q.notify({
              color: "negative",
              position: "bottom",
              timeout: 1500,
              message: "Usuário não foi encontrado",
              icon: "report_problem"
            });
          } else {
            this.$q.notify({
              color: "negative",
              position: "bottom",
              timeout: 1500,
              message: "Erro",
              icon: "report_problem"
            });
          }
        });
    },
    editarPessoa(dadosPessoa) {
      api
        .put(`api/pessoas/${dadosPessoa.codigo}`, {
          nome_usuario: dadosPessoa.nomeUsuario,
          email_usuario: dadosPessoa.emailUsuario,
          fk_categoria_id: dadosPessoa.categoriaUsuarioInt
        })
        .then(response => {
          this.$q.notify({
            color: "positive",
            position: "bottom",
            timeout: 1000,
            message: response.data,
            icon: "done"
          });
          let usuarioEditado = this.pessoas.find(element => {
            return element.codigo === dadosPessoa.codigo;
          });
          usuarioEditado.nome_usuario = dadosPessoa.nomeUsuario;
          usuarioEditado.email_usuario = dadosPessoa.emailUsuario;
          usuarioEditado.fk_categoria_id = dadosPessoa.categoriaUsuarioInt;
        })
        .catch(error => {
          if (error) {
            Object.values(error.response.data.errors).forEach(element => {
              this.$q.notify({
                color: "negative",
                position: "bottom",
                timeout: 1500,
                message: element,
                icon: "report_problem"
              });
            });
          }
        });
    },
    adicionarPessoa(dadosPessoa) {
      api
        .post("/api/pessoas", {
          nome_usuario: dadosPessoa.nomeUsuario,
          email_usuario: dadosPessoa.emailUsuario,
          fk_categoria_id: dadosPessoa.categoriaUsuarioInt
        })
        .then(response => {
          this.$q.notify({
            color: "positive",
            position: "bottom",
            timeout: 1500,
            message: response.data,
            icon: "done"
          });
          this.getUsers();
        })
        .catch(error => {
          Object.values(error.response.data.errors).forEach(element => {
            this.$q.notify({
              color: "negative",
              position: "bottom",
              timeout: 1500,
              message: element,
              icon: "report_problem"
            });
          });
        });
    }
  },
  mounted() {
    this.getUsers();
  }
};
</script>
