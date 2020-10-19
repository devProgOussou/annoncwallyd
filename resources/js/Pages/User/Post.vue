<template>
<layout>
    <div class="container">
        <form @submit.prevent="handleSubmit" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">This is the post Page</h1>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nom du produit : </label>
                        <input type="text" name="name" class="form-control" v-model="post.name" id="name" tabindex="1">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Image : </label>
                        <input type="file" name="image" class="form-control" id="image" tabindex="2">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Description : </label>
                        <textarea name="description" id="description" cols="20" rows="10" v-model="post.description" class="form-control" tabindex="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12"><button class="btn btn-success">Sauvegarder</button></div>
        </form>
    </div>
</layout>
</template>

<script>
import Layout from './../../Shared/Layout'

export default {
    components: {
        Layout
    },
    props: ['user'],
    data: function () {
        return {
            post: {
                name: '',
                image: '',
                description: ''
            }
        }
    },
    methods: {
        async handleSubmit() {
            let response = await this.$inertia.post('/post/add', this.post)
            console.log(response)
        }
    },
}
</script>
