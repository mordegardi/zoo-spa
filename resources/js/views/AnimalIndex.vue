<template>
    <div class="row" style="display: block;">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Animals</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <router-link :to="{ name: 'animals.create' }" class="btn btn-success">Create</router-link>
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                <th class="column-title">Name</th>
                                <th class="column-title">Species</th>
                                <th class="column-title">Nickname</th>
                                <th class="column-title">Image</th>
                                <th class="column-title no-link last"><span class="nobr">Actions</span></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr
                                    v-for="({ id, name, species, nickname, image }, index) in animals"
                                    :class="{ even: index % 2 === 0, odd: index % 2 !== 0}"
                                    :key="id"
                                >
                                    <td>{{ name }}</td>
                                    <td>{{ species }}</td>
                                    <td>{{ nickname }}</td>
                                    <td><img :src="image" alt="" width="30%"></td>
                                    <td class="last">
                                        <router-link :to="{ name: 'animals.edit', params: { id } }">View</router-link> /
                                        <a href="#" @click.prevent="onDelete(id)">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import api from '../api/animals';

    export default {
        data() {
            return {
                loading: false,
                animals: null,
                error: null,
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            getAnimals() {
                api.all()
                    .then(response => {
                        this.loading = false;
                        this.animals = response.data.data;
                    })
                    .catch(error => {
                        this.loading = false;
                        this.error = error.response.data.message || error.message;
                    });
            },
            fetchData() {
                this.error = this.users = null;
                this.loading = true;
                this.getAnimals();
            },
            onDelete(id) {
                api.delete(id)
                    .then(response => {
                        this.getAnimals();
                    })
                    .catch(err => {
                        console.log(err);
                    });
            }
        }
    }
</script>
