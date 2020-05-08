<template>
  <div class="row">
        <div v-if="! loaded">Loading...</div>
        <div class="col-md-12 col-sm-12" v-else>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Update an animal</h2>
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
                            <button type="submit" class="btn btn-success" :disabled="saving">Update</button>
                        </div>
                        </div>
                    </form>
                    <!-- end form for validations -->
                </div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
    $green: lighten(rgb(74, 153, 74), 30%);
    $darkGreen: darken($green, 50%);
    .alert {
        background: $green;
        color: $darkGreen;
        padding: 1rem;
        margin-bottom: 1rem;
        width: 50%;
        border: 1px solid $darkGreen;
        border-radius: 5px;
    }
</style>
<script>
    import api from '../api/animals';

    export default {
        data() {
            return {
                message: null,
                loaded: false,
                saving: false,
                species: [],
                animal: {
                    id: null,
                    species_id: null,
                    name: '',
                    nickname: '',
                    image: '',
                    species: '',
                },
            };
        },
        methods: {
            onCancel() {
                this.$router.push({ name: 'animals.index' });
            },
            onSubmit(event) {
                this.saving = true;

                api.update(this.animal.id, {
                    name: this.animal.name,
                    species_id: this.animal.species_id,
                    nickname: this.animal.nickname,
                    image: this.animal.image,
                }).then(response => {
                    this.message = 'Animal updated';
                    setTimeout(() => this.message = null, 2000);
                    this.animal = response.data.data;
                }).catch(error => {
                    console.log(error);
                }).then(() => this.saving = false);
            }
        },
        created() {
            api.find(this.$route.params.id)
                .then(response => {
                    api.getSpecies()
                        .then(response => {
                            this.species = response.data;
                        });
                        
                    this.animal = response.data.data;
                })
                .catch(err => {
                    this.$router.push({ name: '404' });
                })
                .then(() => this.loaded = true);
        }
    };
</script>