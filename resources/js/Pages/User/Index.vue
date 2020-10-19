<template>
<layout>
    <div class="container">
        <h1 class="col-md-12 text-center mb-2">User Administration : <strong>{{ user }}</strong></h1>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Nom produit</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    <tr :key="advertisement.id" v-for="advertisement in advertisements">
                        <td>{{ advertisement.id}}</td>
                        <td><img alt="product" src=""></td>
                        <td>{{ advertisement.name }}</td>
                        <td>{{ advertisement.description }}</td>
                        <td>
                            <!--                                <form @submit.prevent="Afficher">-->
                            <inertia-link v-if="advertisement.id" href="">
                                <button class="btn btn-info"> ></button>
                            </inertia-link>
                            <!--                                </form>-->
                            <!--                                <form @submit.prevent="HandleDeactivate">-->
                            <button class="btn btn-warning" v-if="advertisement.is_available === 1">
                                Desactiver
                            </button>
                            <!--                                </form>-->
                            <form @submit.prevent="handleActivate">
                                <button class="btn btn-success" v-if="advertisement.is_available === 0">
                                    Activer
                                </button>
                            </form>
                            <button class="btn btn-danger" v-on:click="handleDelete">Supprimer</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</layout>
</template>

<script>
import Layout from './../../Shared/Layout'

export default {
    components: {
        Layout
    },
    props: ['advertisements'],
    methods: {
        async Afficher() {
            await axios.get('/post/view/1', {});
        },
        async handleDeactivate() {
            await axios.get('http://localhost:8000/post/edit/{advertisement}')
                .then(response => console.log(response))
                .catch(error => console.log(error))
        },
        async handleActivate() {

        },
        async handleDelete() {

        }
    },
    created() {

    }
}
</script>
