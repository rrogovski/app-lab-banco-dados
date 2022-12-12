<template>
    <div class="card">
        <!-- <div class="card-header">
                            <h4 class="card-title">Basic Inputs</h4>
                        </div> -->

        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <form @submit.prevent="StoreForm()" action="/pessoas" method="POST">
                        <div class="form-group">
                            <label for="basicInput">Nome</label>
                            <input type="text" class="form-control " id="nome" placeholder="Nome"
                                v-model="form.nome" v-bind:class="{ 'is-invalid': erorr.nome }">
                            <div v-if="erorr.nome" class="invalid-feedback">
                                {{ erorr.nome[0]  }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop">CPF/CNPJ</label>
                            <input type="text" class="form-control" id="cpf-cnpj" placeholder="CPF/CNPJ"
                                v-model="form.cpf_cnpj" v-bind:class="{ 'is-invalid': erorr.cpf_cnpj }">
                            <div v-if="erorr.cpf_cnpj" class="invalid-feedback">
                                {{ erorr.cpf_cnpj[0]  }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="helperText">Sexo</label>
                            <select class="form-control" v-bind:class="{ 'is-invalid': erorr.sexo }" name="" id=""
                                v-model="form.sexo">
                                <option value="">-- Selecione o Sexo --</option>
                                <option v-for="options in option" v-bind:key="options.codigo" v-bind:value="options">
                                    {{ options.codigo+' - '+options.termo }}</option>
                            </select>
                            <div v-if="erorr.sexo" class="invalid-feedback">
                                {{ erorr.sexo[0]  }}
                            </div>
                        </div>

                        <div class="form-group">
                            <v-data-table
                                :headers="headers"
                                :items="telefones"
                                sort-by="tipo"
                                class="elevation-1"
                            >
                                <template v-slot:top>
                                <v-toolbar
                                    flat
                                >
                                    <v-toolbar-title>Telefones</v-toolbar-title>
                                    <v-divider
                                    class="mx-4"
                                    inset
                                    vertical
                                    ></v-divider>
                                    <v-spacer></v-spacer>
                                    <v-dialog
                                    v-model="dialog"
                                    max-width="500px"
                                    >
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-btn
                                        color="primary"
                                        dark
                                        class="mb-2"
                                        v-bind="attrs"
                                        v-on="on"
                                        >
                                        Novo Telefone
                                        </v-btn>
                                    </template>
                                    <v-card>
                                        <v-card-title>
                                        <span class="text-h5">{{ formTitle }}</span>
                                        </v-card-title>

                                        <v-card-text>
                                        <v-container>
                                            <v-row>
                                            <v-col
                                                cols="12"
                                                xs="12"
                                                sm="4"
                                            >
                                            <div class="form-group">
                                                <label for="helperText">Tipo Telefone</label>
                                                <select
                                                    class="form-control"
                                                    v-bind:class="{ 'is-invalid': erorr.tipo_telefone }"
                                                    name="tipoTelefone"
                                                    id=""
                                                    v-model="editedItem.tipo_telefone">
                                                    <option value="">-- Selecione o Tipo de Telefone --</option>
                                                    <option v-for="options in tipoTelefone" v-bind:key="options.codigo" v-bind:value="options">
                                                        {{ options.codigo+' - '+options.termo }}</option>
                                                </select>
                                                <div v-if="erorr.tipo_telefone" class="invalid-feedback">
                                                    {{ erorr.tipo_telefone[0]  }}
                                                </div>
                                            </div>
                                            </v-col>
                                            <v-col
                                                cols="12"
                                                xs="12"
                                                sm="8"
                                            >
                                            <div class="form-group">
                                                <label for="helpInputTop">Número</label>
                                                <input type="text" class="form-control" id="numero" placeholder="Número"
                                                    v-model="editedItem.numero" v-bind:class="{ 'is-invalid': erorr.numero }">
                                                <div v-if="erorr.numero" class="invalid-feedback">
                                                    {{ erorr.numero[0]  }}
                                                </div>
                                            </div>
                                            </v-col>
                                            </v-row>
                                        </v-container>
                                        </v-card-text>

                                        <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn
                                            color="blue darken-1"
                                            text
                                            @click="close"
                                        >
                                            Cancelar
                                        </v-btn>
                                        <v-btn
                                            color="blue darken-1"
                                            text
                                            @click="save"
                                        >
                                            Adicionar
                                        </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                    </v-dialog>
                                    <v-dialog v-model="dialogDelete" max-width="550px">
                                    <v-card>
                                        <v-card-title class="text-h5">Tem certeza que deseja remover esse número?</v-card-title>
                                        <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn color="blue darken-1" text @click="closeDelete">Não</v-btn>
                                        <v-btn color="blue darken-1" text @click="deleteItemConfirm">Sim</v-btn>
                                        <v-spacer></v-spacer>
                                        </v-card-actions>
                                    </v-card>
                                    </v-dialog>
                                </v-toolbar>
                                </template>
                                <template v-slot:[`item.actions`]="{ item }">
                                <v-icon
                                    small
                                    class="mr-2"
                                    @click="editItem(item)"
                                >
                                    mdi-pencil
                                </v-icon>
                                <v-icon
                                    small
                                    @click="deleteItem(item)"
                                >
                                    mdi-delete
                                </v-icon>
                                </template>
                                <template v-slot:no-data>
                                <span>
                                    Sem dados
                                </span>
                                </template>
                            </v-data-table>
                        </div>

                        <router-link to="/pessoas" class="btn btn-danger">Cancelar</router-link>
                        <button type="submit" class="btn btn-success">Salvar</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props : ['id'],
        data() {
            return {
                form: {
                    nome: '',
                    cpf_cnpj: '',
                    sexo: null,
                },
                option: [],
                tipoTelefone: [],
                erorr: [],
                data: {},
                dialog: false,
                dialogDelete: false,
                headers: [
                    {
                    text: 'Tipo',
                    align: 'start',
                    sortable: false,
                    value: 'tipo_telefone.termo',
                    },
                    { text: 'Número', value: 'numero' },
                    { text: '', value: 'actions', sortable: false },
                ],
                telefones: [],
                editedIndex: -1,
                editedItem: {
                    tipo_telefone: null,
                    numero: ''
                },
                defaultItem: {
                    tipo_telefone: null,
                    numero:''
                }
            }
        },
        computed: {
            formTitle () {
                return this.editedIndex === -1 ? 'Novo Telefone' : 'Editar Telefone'
            },
        },
        watch: {
            dialog (val) {
                val || this.close()
            },
            dialogDelete (val) {
                val || this.closeDelete()
            },
        },
        created () {
            this.initialize()
        },
        methods: {
            getValueOption() {
                axios.get('/api/sexo').then((response) => {
                    this.option = response.data;
                    console.log(this.option);
                });
            },
            getTipoTelefone() {
                axios.get('/api/tipo-telefone').then((response) => {
                    this.tipoTelefone = response.data;
                    console.log(this.tipoTelefone);
                });
            },
            getData() {
                axios.get('/api/pessoas/' + this.id + '/edit').then((response) => {
                    console.log(response.data);
                    this.form = { // add data to v-model="form.*"
                        id: response.data.id,
                        nome: response.data.nome,
                        cpf_cnpj: response.data.cpf_cnpj,
                        sexo: response.data.sexo
                    }
                });
            },

            StoreForm() {
                console.log(this.form);
                axios.put('/api/pessoas/'+ this.id, this.form).then((response) => {
                    if (response.data.status) {
                        // console.log(response.data.messege);
                        this.$noty.success(response.data.messege);
                        this.$router.push({
                            name: 'pessoas',
                        });
                    }
                }).catch((erorr) => {
                    // console.log(erorr.response.data.errors);
                    this.erorr = erorr.response.data.errors
                })
            },
            initialize () {
                this.telefones = []
            },

            editItem (item) {
                this.editedIndex = this.telefones.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem (item) {
                this.editedIndex = this.telefones.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialogDelete = true
            },

            deleteItemConfirm () {
                this.telefones.splice(this.editedIndex, 1)
                this.closeDelete()
            },

            close () {
                this.dialog = false
                this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
                })
            },

            closeDelete () {
                this.dialogDelete = false
                this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
                })
            },

            save () {
                console.log(this.form);
                console.log(this.editedItem);

                const telefone = {
                    pessoa: this.id,
                    tipo: this.editedItem.tipo_telefone.codigo,
                    numero: this.editedItem.numero
                }

                axios.post('/api/pessoa-telefone', telefone).then((response) => {
                    if (response.data.status) {
                        console.log(response.data.messege);
                        this.$noty.success(response.data.messege);
                        this.close()
                        this.$router.go(this.$router.currentRoute);
                    }
                }).catch((erorr) => {
                    this.erorr = erorr.response.data.errors
                })

                // if (this.editedIndex > -1) {
                // Object.assign(this.telefones[this.editedIndex], this.editedItem)
                // } else {
                // this.telefones.push(this.editedItem)
                // }
                // this.close()
            },
        },
        mounted() {
            this.getValueOption(),
            this.getData()
            this.getTipoTelefone()
        },
    }

</script>
