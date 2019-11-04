<template>
    <div class="container-fluid">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Amenities</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <button @click="addAmenitiesModal" class="btn btn-success">Add Amenities <i class="fa fa-plus"></i></button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>#</th>
                    <th>Amenities</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                  <tr v-for="(record, index) in records" :key="record.id">
                    <td>{{index+1}}</td>
                    <td>{{record.amenities}}</td>
                    <td><i :class="['fa',record.icon]"></i></td>
                    <td class="text-success font-weight-bold" v-if="record.status == 'Activated'">{{record.status}}</td>
                    <td class="text-danger font-weight-bold" v-else>{{record.status}}</td>

                    <td>
                        <span style="cursor:pointer" @click="editAmenitiesModal(record.id)" class="badge badge-primary p-2 float-right ml-1">Edit Amenities</span>

                        <span v-if="record.status == 'Activated'" @click="status(record.id)" style="cursor:pointer" class="badge badge-danger p-2 float-right">Deactivate</span>

                        <span v-else style="cursor:pointer" @click="status(record.id)" class="badge badge-success p-2 float-right">Activate</span>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
    <form @submit.prevent="editMode ? updateAmenities(): createAmenities()">
            <div class="modal animated zoomIn faster" id="addAmenities" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Amenities</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Amenities</label>
                                        <input v-model="form.amenities" type="text" name="amenities"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('amenities') }">
                                        <has-error :form="form" field="amenities"></has-error>
                                    </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-10 text-center">
                                <span>
                                    <i class="fa fa-wifi"></i>
                                    <input type="radio" name="icon" value="fa-wifi" v-model="form.icon" style="transform: scale(1.5);">
                                </span>
                                <span class="ml-5">
                                    <i class="fa fa-bed"></i>
                                    <input type="radio" name="icon" value="fa-bed" v-model="form.icon" style="transform: scale(1.5);">
                                </span>
                                <span class="ml-5">
                                    <i class="fa fa-utensils"></i>
                                    <input type="radio" name="icon" value="fa-utensils" v-model="form.icon" style="transform: scale(1.5);">
                                </span>
                                <span class="ml-5">
                                    <i class="fa fa-bath"></i>
                                    <input type="radio" name="icon" value="fa-bath"  v-model="form.icon" style="transform: scale(1.5);">
                                </span>
                                <span class="ml-5">
                                    <i class="fa fa-tv"></i>
                                    <input type="radio" name="icon" value="fa-tv" v-model="form.icon" style="transform: scale(1.5);">
                                </span>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col-md-10 text-center">
                                <span>
                                    <i class="fa fa-shower"></i>
                                    <input type="radio" name="icon" value="fa-shower" v-model="form.icon" style="transform: scale(1.5);">
                                </span>
                                <span class="ml-5">
                                    <i class="fa fa-air-freshener"></i>
                                    <input type="radio" name="icon" value="fa-air-freshener" v-model="form.icon" style="transform: scale(1.5);">
                                </span>
                                <span class="ml-5">
                                    <i class="fa fa-image"></i>
                                    <input type="radio" name="icon" value="fa-image" v-model="form.icon" style="transform: scale(1.5);">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Amenities</button>
                    </div>
                    </div>
                </div>
            </div>
    </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                editMode: false,
                records:{},
                form: new Form({
                    id:"",
                    amenities:"",
                    icon:""
                })
            }
        },

        methods:{
            loadAmenities(){
                axios.get('api/amenities').then(({data}) => (this.records = data.data));
            },
            addAmenitiesModal(){
                this.editMode = false;
                $('#addAmenities').modal('show');
                
            },
            createAmenities(){
                this.form.post('api/amenities')
                .then((data) => {
                    this.$Progress.start();
                    Toast.fire({
                        type: 'success',
                        title: 'Successfully Added'
                    })
                    this.$Progress.finish();
                    this.form.clear();
                    this.form.reset();
                    $('#addAmenities').modal('hide');
                    Fire.$emit('AfterCreate');
                })
                .catch(() => {

                })
                
            },

            editAmenitiesModal(id){
                 this.editMode = true;
                $('#addAmenities').modal('show');
                this.form.get('api/amenities/'+id)
                .then((data) => {
                    this.form.amenities = data.data.amenities;
                    this.form.id = data.data.id;
                })
                .catch(() => {

                })
            
            },
            updateAmenities(){
                this.form.put('api/amenities/'+this.form.id)
                .then((data) => {
                    Toast.fire({
                        type: 'success',
                        title: 'Record Update'
                    })
                     $('#addAmenities').modal('hide');
                    console.log('amenities updated');
                    Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    
                })
            },

            status(id){
                this.form.get('api/amenitiesStatus/'+id)
                .then((data) => {
                    Toast.fire({
                        type: 'success',
                        title: 'Record Update'
                    })
                    Fire.$emit('AfterCreate');
                    console.log(data.data);
                })
                .catch(() => {

                })
            }

        },
        created() {
            this.loadAmenities();
            Fire.$on('AfterCreate',() => {
                 this.loadAmenities();
             })
            console.log('Component mounted.')
        }
    }
</script>
