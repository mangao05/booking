<template>
    <div class="container-fluid">
        <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Users</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                      <button @click="addUserModal" class="btn btn-success">Add User <i class="fa fa-user-plus"></i> </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-center">
                    <tbody>
                        <tr >
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Login Details</th>
                            <th>Action</th>
                        </tr>
                        <tr v-for="employee in employees.data" :key="employee.id">
                                <td class="text-capitalize">{{employee.firstname}}</td>
                                <td class="text-capitalize">{{employee.lastname}}</td>
                                <td class="text-capitalize">{{employee.email}}</td>
                                <td v-if="employee.status == 'Activated'" class="text-success font-weight-bold">{{employee.status}}</td>
                                <td v-else class="text-danger font-weight-bold">{{employee.status}}</td>
                                <td v-if="employee.last_login_at == null">Not <label for="">login</label>  yet</td>
                                <td v-else ><vue-moments-ago prefix="Login" suffix="ago" :date="employee.last_login_at"></vue-moments-ago></td>
                                <td>
                                    <span style="cursor:pointer;" class="badge badge-primary p-2 ml-1" @click="editUserModal(employee.id)" >Edit Profile</span>
                                    <span v-if="employee.status == 'Activated' ">
                                        <span style="cursor:pointer;" class="badge badge-danger p-2 " @click="status(employee.id,0)">Deactivate</span>
                                    </span>
                                    <span v-else>
                                        <span style="cursor:pointer;" class="badge badge-success p-2 t" @click="status(employee.id,1)">Activate</span>
                                    </span>
                                </td>
                              
                        </tr>
                 
                    </tbody>
                </table>
                    <pagination class="mt-2 mr-4" :data="employees" @pagination-change-page="loadUser" size="small" align="right">
                        <span slot="prev-nav">&lt; Previous</span>
	                    <span slot="next-nav">Next &gt;</span>
                    </pagination>
              </div>
              <!-- /.card-body -->
        </div>
            <form @submit.prevent="editMode ?  updateProfile(): createUser()">
            <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode" id="exampleModalLongTitle">Add User</h5>
                        <h5 class="modal-title" v-show="editMode" id="exampleModalLongTitle">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6" style="border-right: #DEE2E6 solid 1px;">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 mt-4">
                                        <img v-show="!editMode"  v-if="url" :src="url" alt="" class="img-fluid img-circle elevation-2">
                                        <img v-show="!editMode"  v-else="" class="img-fluid img-circle elevation-2" :src="'img/user.png'" alt="" srcset="">

                                        <img v-show="editMode"  v-if="url" :src="url" alt="" class="img-fluid img-circle elevation-2">
                                        <img v-show="editMode"  v-else="" class="img-fluid img-circle elevation-2" :src="editPic ? getProfilePhoto() : ''" alt="" srcset="">

                                    </div>
                                </div>
                                <div class="ml-3 mt-3">
                                    <input  type="file" @change="uploadProfilePic">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                       <div class="form-group">
                                            <label>First Name</label>
                                            <input v-model="form.firstname" type="text" name="firstname"
                                                class="form-control text-capitalize" :class="{ 'is-invalid': form.errors.has('firstname') }">
                                            <has-error :form="form" field="firstname"></has-error>
                                        </div>

                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input v-model="form.lastname" type="text" name="lastname"
                                                class="form-control text-capitalize" :class="{ 'is-invalid': form.errors.has('lastname') }">
                                            <has-error :form="form" field="lastname"></has-error>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input v-model="form.email" type="email" name="email"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                            <has-error :form="form" field="email"></has-error>
                                        </div>

                                        <div class="form-group" v-show="!editMode">
                                            <label>Temporary Password</label>
                                            <input v-model="form.password" type="password" name="password"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                            <has-error :form="form" field="password"></has-error>
                                        </div>

                                        <div class="form-group" v-show="!editMode">
                                            <label>Confirm Password</label>
                                            <input v-model="form.password_confirmation" type="password" name="password-confirm"
                                                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                            <has-error :form="form" field="password"></has-error>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <input type="file" @change="uploadProfilePic"> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" v-show="editMode" class="btn btn-primary">Update User</button>
                        <button type="submit" v-show="!editMode" class="btn btn-primary">Add New User</button>
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
                url: null,
                employees:{},
                editMode: false,
                editPic: false,
                form: new Form({
                    firstname:"",
                    lastname:"",
                    email:"",
                    password:"",
                    password_confirmation:"",
                    employeeID:"",
                    photo:"",
                    myphoto:""
                })
            }
        },

        methods: {
            loadUser(page = 1){
                axios.get("api/employee?page=" + page)
                .then(({data}) => {
                    this.employees = data
                });
            },
            getProfilePhoto(){
                return "img/profile/"+this.form.myphoto;
            },
            // create user

            addUserModal(){
                this.form.firstname = "";
                this.form.lastname = "";
                this.form.email = "";
                this.form.password = "";
                this.form.password_confirmation = "";
                this.form.clear();
                this.url = null;
                this.$Progress.start()
                $('#editProfileModal').modal('show');
                this.editMode = false;
                this.$Progress.finish();
            },

            createUser(){
                this.form.post('api/employee')
                .then((data) => {
                    console.log(data.data);
                    $('#editProfileModal').modal('hide');
                    Fire.$emit('AfterCreate');
                })
                .catch(() => {

                });
                
            },

            // end create user
            
            // edit user
             editUserModal(id){
                this.url = null;
                this.$Progress.start()
                this.editMode = true;
                this.form.get('api/employee/'+id)
                .then((data) => {
                    this.form.firstname = data.data.firstname;
                    this.form.lastname = data.data.lastname;
                    this.form.email = data.data.email; 
                    this.form.myphoto = data.data.photo;
                    this.form.employeeID = id;
                    this.editPic = true;
                    Fire.$emit('AfterCreate');
                    $('#editProfileModal').modal('show');
                    this.$Progress.finish();
                })
                .catch(() => {

                });

            },

            updateProfile(){
                this.form.put('api/employee/'+this.form.employeeID)
                .then((data) => {
                    Toast.fire({
                        type: 'success',
                        title: 'Record Updated'
                    })
                    $('#editProfileModal').modal('hide');
                    Fire.$emit('AfterCreate');
                    document.location.reload(true);
                })
                .catch(() => {

                });
            },

            // end edit user

            // status
            status(id,status){
                let remarks = "";

                if(status == 1){
                    remarks = "Activate";    
                }else{
                    remarks = "Deactivate";
                }

                console.log(remarks);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to "+remarks+" this User!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: remarks
                }).then((result) => {
                if (result.value) {
                    this.form.get('api/status/'+id)
                    .then((data) => {
                        Fire.$emit('AfterCreate');
                        Toast.fire({
                            type: 'success',
                            title: 'Record Updated'
                        })
                        
                    })
                    .catch(() => {

                    })
                       
                }
                })
               
            },
            // end status

            uploadProfilePic(e){
                let file = e.target.files[0];
                this.url = URL.createObjectURL(file);
                let reader = new FileReader();
                reader.onloadend = (file) => {
                    // console.log('RESULT', reader.result)
                    this.form.photo = reader.result;
                }
                reader.readAsDataURL(file);
                },

        },
        created() {
            
            this.loadUser();
             $('#editProfileModal').on('hide.bs.modal',function(){
                this.editPic = false;
             })
             Fire.$on('AfterCreate',() => {
                 this.loadUser();
             })
            console.log('Component mounted.')
        }
    }
</script>
