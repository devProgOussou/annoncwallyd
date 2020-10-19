<template>
<homedash>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4" v-for="post in posts" :key="post.id">
                <div class="card card-hover-shadow">
                    <img class="card-img-top" src="" alt="Card image cap">
                    <div class="card-block bg-dark text-light">
                        <h4 class="card-title text-center">{{ post.name }}</h4>
                        <p class="card-text text-center">{{ post.description }}</p>
                        <button class="btn btn-info m-3">
                            Consulter
                        </button>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</homedash>
</template>

<script>
import HomeDash from './../../Shared/HomeDash'

export default {
    components: {
        homedash: HomeDash
    },
    props: {
        posts: Array
    },
    methods: {
        HandleOrder() {

        }
    }
}
</script>
