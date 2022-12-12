<template>
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class="px-3 py-3 d-flex justify-content-between">
                            <h3 class="card-title">
                                <i data-feather="user" style="width: 30px; height: 30px"></i>
                                <span style="font-size: 1rem;">Contatos</span>
                            </h3>
                        </div>
                        <div class="card-right ml-3 mb-4">
                            <p>{{ data.pessoas }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class="px-3 py-3 d-flex justify-content-between">
                            <h3 class="card-title"> <i data-feather="home" style="width: 30px; height: 30px">
                            </i>
                            <span style="font-size: 1rem;">Cidades</span>
                            </h3>
                        </div>
                        <div class="card-right ml-3 mb-4">
                            <p>{{ data.cidades }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                data: {
                    pessoas: '0',
                    cidades: '0',
                }
            }
        },
        methods: {
            getAllData() {
                axios.get('/api/dashboard').then((response) => {
                    this.data = {
                        contatos: response.data.pessoas,
                        cidades: response.data.cidades,
                    }
                })
            }
        },
        mounted() {
            this.getAllData();
        },
    }

</script>
