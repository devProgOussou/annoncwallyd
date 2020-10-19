<template>
<layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <table class="table">

                    <tr>
                        <th>
                        <td>id</td>
                        </th>
                        <th>
                        <td>nom complet</td>
                        </th>
                        <th>
                        <td>email</td>
                        </th>
                        <th>
                        <td>Type</td>
                        </th>
                        <th>
                        <td>Actions</td>
                        </th>
                    </tr>
                    <tr v-for="user in users" v-bind:key="user.id">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td v-if="user.is_company === 1 && user.is_admin === 0">Entreprise</td>
                        <td v-else-if="user.is_company === 0 && user.is_admin === 0">Particulier</td>
                        <td v-else>Administrateur</td>
                        <td>
                            <a href="/admin/show/user/">
                                <Button class="btn btn-round btn-outline-info">Afficher</Button>
                            </a>
                            <a href="">
                                <Button class="btn btn-round btn-outline-warning">Desactiver</Button>
                            </a>
                            <a href="">
                                <Button class="btn btn-round btn-outline-danger">Supprimer</Button>
                            </a>
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
    props: ['user']
}
</script>
