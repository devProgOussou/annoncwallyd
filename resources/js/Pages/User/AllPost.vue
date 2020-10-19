<template>
<layout>
    <div class="container">
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
                    <tr :key="post.id" v-for="post in posts">
                        <td>{{ post.id}}</td>
                        <td><img alt="product" src=""></td>
                        <td>{{ post.name }}</td>
                        <td>{{ post.description }}</td>
                        <td>
                            <button class="btn btn-outline-info" v-on:click="hanldeOrder">Commander</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</layout>
</template>

<script>
import Axios from 'axios'
import Layout from './../../Shared/Layout'

export default {
    components: {
        Layout,
        Axios
    },
    props: {
        "posts": Array,
        "user": String,
    },
    methods: {
        async hanldeOrder() {
            await axios.post();
        }
    }
}
</script>
