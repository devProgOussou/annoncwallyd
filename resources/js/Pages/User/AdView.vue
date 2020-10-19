<template>
<layout>
    <div class="container-fluid">
        <div class="col-md-12">
            <button class="btn btn-sm btn-primary" @click="openModal()">Add New</button>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nom produit</td>
                        <td>Image</td>
                        <td>Description</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tr v-for="advertisement in advertisements" :key="advertisement.id">
                    <td>{{ advertisement.id }}</td>
                    <td>{{ advertisement.name }}</td>
                    <td><img src="" alt="image produit"></td>
                    <td>{{ advertisement.description }}</td>
                    <td width="130">
                        <button @click="edit(advertisements)" class="btn btn-sm btn-primary">Modifier</button>
                        <button @click="deleteRow(advertisements)" class="btn btn-sm btn-danger">Supprimer</button>
                    </td>
                </tr>
            </table>

            <div class="modal fade" id="modal">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nouveau Post</h4>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name">Nom produit</label>
                                <input class="form-control" required id="name" v-model="form.name" />
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input class="form-control" required id="image" v-model="form.image" />
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input class="form-control" required id="description" v-model="form.description" />
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" @click="closeModal()">Fermer</button>
                            <button type="submit" class="btn btn-primary" v-show="!editMode" @click="save(form)">Sauvegareder
                            </button>
                            <button type="submit" class="btn btn-primary" v-show="editMode" @click="update(form)">Modifier
                            </button>
                        </div>
                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

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
    data() {
        return {
            editMode: false,
            form: {
                name: null,
                image: null,
                description: null,
            },
        }
    },
    methods: {
        openModal: function () {
            $('#modal').modal('show')
        },
        closeModal: function () {
            $('#modal').modal('hide')
            this.reset();
            this.editMode = false;
        },
        created: function () {
            this.form = {
                name: '',
                image: '',
                description: '',
            }
        },
        save: function (advertisements) {
            this.$inertia.post('/post/add', advertisements)
            this.advertisements = this.form
            this.reset();
            this.closeModal();
            this.editMode = false;
        },
        edit: function (advertisements) {
            this.form = Object.assign({}, advertisements);
            this.editMode = true;
            this.openModal();
        },
        update: function (advertisements) {
            if (!confirm('Vous etes sur')) return;
            advertisements._method = 'PUT';
            this.$inertia.post('/post/edit/' + advertisements.id, advertisements)
            this.reset();
            this.closeModal();
        },
        deleteRow: function (advertisements) {
            if (!confirm('vous etes sur')) return;
            advertisements._method = 'DELETE';
            this.$inertia.post('/post/delete/' + advertisements.id, advertisements)
            this.reset();
            this.closeModal();
        }
    }
}
</script>
