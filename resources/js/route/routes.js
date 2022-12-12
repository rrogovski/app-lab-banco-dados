import Vue from 'vue'
import VueRouter from 'vue-router'

// mengaktifkan vue router
Vue.use(VueRouter);

import dashboard from '../pages/dashboard.vue'
// kelas
import index_kelas from '../pages/kelas/index.vue'
import create_kelas from '../pages/kelas/create.vue'
import edit_kelas from '../pages/kelas/edit.vue'
// siswa
import index_siswa from '../pages/siswa/index.vue'
import create_siswa from '../pages/siswa/create.vue'
import edit_siswa from '../pages/siswa/edit.vue'
// sexo
// import index_sexo from '../pages/sexo/index.vue'
// import create_sexo from '../pages/sexo/create.vue'
// import edit_sexo from '../pages/sexo/edit.vue'
// pessoas
import index_pessoas from '../pages/pessoas/index.vue'
import create_pessoa from '../pages/pessoas/create.vue'
import edit_pessoa from '../pages/pessoas/edit.vue'

const routes = [
    // {
    //     name: 'sexo',
    //     path: '/sexo',
    //     meta: 'Sexo',
    //     component: index_sexo,
    //     beforeEnter: (to, from, next) => {
    //         document.title = "Voler - " + to.meta
    //         next()
    //     },
    // },
    // {
    //     name: 'create_sexo',
    //     path: '/kesexolas/create',
    //     meta: 'Adicionar Sexo',
    //     component: create_sexo,
    //     beforeEnter: (to, from, next) => {
    //         document.title = "Voler - " + to.meta
    //         next()
    //     },
    // },
    // {
    //     name: 'edit_sexo',
    //     path: '/sexo/:id',
    //     meta: 'Editar Sexo',
    //     component: edit_sexo,
    //     props: true,
    //     beforeEnter: (to, from, next) => {
    //         document.title = "Voler - " + to.meta
    //         next()
    //     },
    // },
    {
        name: 'pessoas',
        path: '/pessoas',
        meta: 'Pessoas',
        component: index_pessoas,
        beforeEnter: (to, from, next) => {
            document.title = "Voler - " + to.meta
            next()
        },
    },
    {
        name: 'create_pessoa',
        path: '/pessoas/create',
        meta: 'Adicionar Pessoa',
        component: create_pessoa,
        beforeEnter: (to, from, next) => {
            document.title = "Voler - " + to.meta
            next()
        },
    },
    {
        name: 'edit_pessoa',
        path: '/pessoas/:id',
        meta: 'Editar Pessoa',
        component: edit_pessoa,
        props: true,
        beforeEnter: (to, from, next) => {
            document.title = "Voler - " + to.meta
            next()
        },
    },
    {
        name: 'siswa',
        path: '/siswa',
        meta: 'Siswa',
        component: index_siswa,
        beforeEnter: (to, from, next) => {
            document.title = "Voler - " + to.meta //sebelum masuk ubah title + meta di route
            next() // lanjutkan
        },
    },
    {
        name: 'create_siswa',
        path: '/siswa/create',
        meta: 'Tambah Siswa',
        component: create_siswa,
        beforeEnter: (to, from, next) => {
            document.title = "Voler - " + to.meta
            next()
        },
    },
    {
        name: 'edit_siswa',
        path: '/siswa/:id',
        meta: 'Edit Siswa',
        component: edit_siswa,
        props: true,
        beforeEnter: (to, from, next) => {
            document.title = "Voler - " + to.meta
            next()
        },
    },
    {
        name: 'kelas',
        path: '/kelas',
        meta: 'Kelas',
        component: index_kelas,
        beforeEnter: (to, from, next) => {
            document.title = "Voler - " + to.meta
            next()
        },
    },
    {
        name: 'create_kelas',
        path: '/kelas/create',
        meta: 'Tambah Kelas',
        component: create_kelas,
        beforeEnter: (to, from, next) => {
            document.title = "Voler - " + to.meta
            next()
        },
    },
    {
        name: 'edit_kelas',
        path: '/kelas/:id',
        meta: 'Edit Kelas',
        component: edit_kelas,
        props: true,
        beforeEnter: (to, from, next) => {
            document.title = "Voler - " + to.meta
            next()
        },
    },
    {
        name: 'dashboard',
        path: '*',
        meta: 'Dashboard',
        component: dashboard,
        beforeEnter: (to, from, next) => {
            document.title = "Voler - " + to.meta
            next()
        }
    },
]

const router = new VueRouter({
    LinkaAtiveClass: 'active',
    mode: 'history',
    routes
})


export default router
