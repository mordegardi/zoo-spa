<template>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create an animal</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p v-if="message" class="alert">{{ message }}</p>
                    <!-- start form for validation -->
                    <form id="demo-form" class="form-horizontal form-label-left" @submit.prevent="onSubmit($event)">
                        <div class="item form-group">
                            <label class="col-form-label col-md-1 col-sm-1 label-align" for="first-name">Animal Name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" required="required" class="form-control" v-model="animal.name">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-1 col-sm-1 label-align" for="last-name">Species<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="select2_group form-control" v-model="animal.species_id">
                                    <optgroup label="Species">
                                        <option
                                            v-for="s in species"
                                            :value="s.id"
                                            :key="s.id"
                                        >{{ s.name }}</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-1 col-sm-1 label-align" for="last-name">Nickname<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="last-name" required="required" class="form-control" v-model="animal.nickname">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-1 col-sm-1 label-align" for="last-name">Image<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="last-name" required="required" class="form-control" v-model="animal.image">
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="item form-group">
                        <div class="col-md-6 col-sm-6">
                            <button class="btn btn-primary" type="button" @click.prevent="onCancel">Cancel</button>
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                        </div>
                    </form>
                    <!-- end form for validations -->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import api from '../api/animals';

    export default {
        data() {
            return {
                message: false,
                species: [],
                animal: {
                    name: '',
                    species_id: '',
                    nickname: '',
                    image: '',
                }
            }
        },
        methods: {
            onCancel() {
                this.$router.push({ name: 'animals.index' });
            },
            onSubmit($event) {
                api.create(this.animal)
                    .then(response => {
                        this.$router.push({ name: 'animals.edit', params: { id: response.data.data.id } });
                    })
                    .catch(e => {
                        this.message = e.response.data.message || 'There was an issue creating the animal.';
                    });
            }
        },
        created() {
            api.getSpecies()
                .then(response => {
                    this.species = response.data;
                });
        }
    }
</script>
