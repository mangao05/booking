<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row p-4">
                        <div class="col-md-5">
                          
                            <div class=" m-4 text-center" v-if="form.photo == 'NULL'">
                                     <img src="img/profile/profile.png" class="img-thumbnail img-fluid elevation-2 " max-width="450" min-width="450" alt="Upload Profile">
                            </div>
                            <div class=" m-4 text-center profilepic"   v-else-if="form.photo">
                                      <img :src="'img/profile/' + form.photo" class="img-thumbnail img-fluid elevation-2 " max-width="450"  min-width="450" alt="Profile">
                            </div>
                            <div class=" m-4 text-center"   v-if="change">
                                      <img :src="form.photo" class="img-thumbnail img-fluid elevation-2 " max-width="450" min-width="450"  alt="Upload Profile">
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" @click="avatar">Change Avatar</button>
                            </div>
                            <div class="pl-5" style="display:none">
                               <input type="file" class="changeAvatar" v-on:change="onFileChange" >
                            </div>
                          
                                   
                        </div>
                            <div class="col-md-6">
                                <form  @submit.prevent="updateProfile()">
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

                                            <div class="row">
                                                <div class="col-6">
                                                     <div class="form-group">
                                                        <label>old password</label>
                                                        <input v-model="form.old_password" type="text" name="old_password"
                                                            class="form-control" :class="{ 'is-invalid': form.errors.has('old_password') }">
                                                        <has-error :form="form" field="old_password"></has-error>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                     <div class="form-group">
                                                        <label>new password</label>
                                                        <input v-model="form.password" type="text" name="password"
                                                            class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                                        <has-error :form="form" field="password"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            

                                            <div class="text-right ">
                                                <button type="submit" class="btn btn-success p-2">Update Profile</button>
                                            </div>      
                                </form>           
                            </div>  
                    </div>
                 

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                user_details:{},
                change:false,

                    form: new Form({
                        firstname:"",
                        lastname:"",
                        email:"",
                        photo:"",
                        id:"",
                        old_password:"",
                        password:"",
                })
            }
        },

        methods:{
          userDetails(page = 1){
                axios.get('api/fetchprofile')
                .then((data) => {
                    this.form.firstname = data.data.firstname;
                    this.form.lastname = data.data.lastname;
                    this.form.email = data.data.email
                    this.form.photo = data.data.photo;
                    this.form.id = data.data.id;
                });
            },
            avatar(){
                $('.changeAvatar').click();
            },
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
               
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    this.change = true;
                    $('.profilepic').hide();
                    vm.form.photo = e.target.result;
                    this.form.photo =  vm.form.photo
        
                };
                reader.readAsDataURL(file);
            },
            updateProfile(){
                this.form.post('api/editprofile/'+this.form.id)
                .then((data) => {
                    Toast.fire({
                        type: 'success',
                        title: 'Record Updated'
                    })
                     document.location.reload(true);
                })
                .catch(() => {

                });
            },
           
        },
        created() {
            this.userDetails();

        }

    }
</script>
