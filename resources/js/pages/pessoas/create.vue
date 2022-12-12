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
                            <input
                                type="text"
                                class="form-control"
                                id="nome"
                                placeholder="Nome"
                                v-model="form.nome"
                                v-bind:class="{ 'is-invalid': erorr.nome }"
                            >
                            <div v-if="erorr.nome" class="invalid-feedback">
                                {{ erorr.nome[0]  }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop">CPF/CNPJ</label>
                            <input
                                type="text"
                                class="form-control"
                                id="helpInputTop"
                                placeholder="CPF/CNPJ"
                                v-model="form.cpf_cnpj"
                                v-bind:class="{ 'is-invalid': erorr.cpf_cnpj }"
                            >
                            <div v-if="erorr.cpf_cnpj" class="invalid-feedback">
                                {{ erorr.cpf_cnpj[0]  }}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="helperText">Sexo</label>
                            <select
                                class="form-control"
                                v-bind:class="{ 'is-invalid': erorr.sexo }"
                                name="sexo"
                                id="sexo"
                                v-model="form.sexo"
                            >
                                <option value="">-- Selecione o Sexo --</option>
                                <option
                                    v-for="options in option"
                                    v-bind:key="options.codigo"
                                    v-bind:value="options.codigo"
                                >
                                    {{ options.codigo+' - '+options.termo }}</option>
                            </select>
                            <div v-if="erorr.sexo" class="invalid-feedback">
                                {{ erorr.sexo[0]  }}
                            </div>
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
        data() {
            return {
                form: {
                    nome: '',
                    cpf_cnpj: '',
                    sexo: null,
                },
                option: [],
                erorr: [],
                data: {},
            }
        },
        methods: {
            getValueOption() {
                axios.get('/api/sexo').then((response) => {
                    this.option = response.data;
                    console.log(this.option);
                });
            },
            StoreForm() {
                axios.post('/api/pessoas', this.form).then((response) => {
                    if (response.data.status) {
                        console.log(response.data.messege);
                        this.$noty.success(response.data.messege);
                        this.$router.push({
                            name: 'edit_pessoa',
                            params: {
                                id: response.data.pessoa.id
                            }

                        });
                    }
                }).catch((erorr) => {
                    // console.log(erorr.response.data.errors);
                    this.erorr = erorr.response.data.errors
                })
            },
        },
        mounted() {
            this.getValueOption()
        },
    }

</script>
