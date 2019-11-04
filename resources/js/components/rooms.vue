<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
  .v-lazy-image {
    filter: blur(10px);
    transition: filter 0.7s;
  }
  .v-lazy-image-loaded {
    filter: blur(0);
  }

  #my-strictly-unique-vue-upload-multiple-image {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
    }

    h1, h2 {
    font-weight: normal;
    }

    ul {
    list-style-type: none;
    padding: 0;
    }

    li {
    display: inline-block;
    margin: 0 10px;
    }

    a {
    color: #42b983;
    }
</style>
<template>
    <div class="container-fluid">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Rooms</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                        <button class="btn btn-success" @click="openModalAddRoom">Add Room <i class="fa fa-plus"></i></button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>Room Image</th>
                    <th>Room Name</th>
                    <th>Room Amenities</th>
                    <th>Description</th>
                  </tr>
                  <tr v-for="roomDetail in roomDetails.data" :key="roomDetail.id">
                    <td style="width:40%;">
                        <img :src="'img/rooms/'+roomDetail.photo" alt="" srcset="" class="img-fluid">
                        <span>Rate:</span><span>{{roomDetail.price}}</span>
                        <br>
                        <span>Guests:</span><span>{{roomDetail.guests}}</span>

                        <span class="badge badge-danger  p-2 float-right mt-2 ml-1" style="cursor:pointer" @click="deletePhotoModal(roomDetail.id,roomDetail.type)"><i class="fa fa-trash" aria-hidden="true"></i> Delete image</span>
                        <span class="badge badge-success  p-2 float-right mt-2 ml-1" style="cursor:pointer" @click="photoModal(roomDetail.id,roomDetail.type)"><i class="fa fa-plus" aria-hidden="true"></i> Add image</span>
                        <span style="cursor:pointer" class=" mt-2 badge badge-primary p-2 float-right" @click="editRoomModal(roomDetail.id)"><i class="fas fa-edit "></i> Edit Room</span>
                    
                    </td>
                    <td style="width:15%;">
                    	{{roomDetail.type}}
                    </td>
                    <td style="width:15%;">
                        <p  v-for="amenities in roomDetail.room_amenities" :key="amenities.id">
                            {{amenities.amenities}}
                        </p>  
                    </td>
                    <td>
                        <div>
                            {{roomDetail.description}}
                        
                        </div>
                        <div class="">
                            
                        </div>
                    </td>
                  </tr>
                </tbody>
                </table>
                    <pagination class="mt-2 mr-4" :data="roomDetails" @pagination-change-page="loadRoom" size="small" align="right">
                        <span slot="prev-nav">&lt; Previous</span>
	                    <span slot="next-nav">Next &gt;</span>
                    </pagination>
              </div>
              <!-- /.card-body -->
            </div>
        <form @submit.prevent="editMode ? updateRoom() : createRoom()">
           <div class="modal animated flipInX 500ms" id="addRoomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"  v-show="!editMode" >Add Room</h5>
                        <h5 class="modal-title" id="exampleModalLabel" v-show="editMode" >Edit Room</h5>
                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height:600px;overflow-y:auto;">
                        <div class="row justify-content-center">
                            <div class="col-md-7 text-center">
                                <img v-show="!editMode" v-if = "url" :src="url" class="img-fluid" alt="" srcset="">
                                <img v-show="!editMode" v-else = "" src="img/rooms/gallery.png" class="img-fluid" alt="">

                                <img v-show="editMode"  v-if = "url" :src="url" class="img-fluid" alt="" srcset="">
                                <img v-show="editMode" v-else = "" :src="editPic ? 'img/rooms/'+form.currentPhohto : ''" class="img-fluid" alt="">
                                
                                <input class="mt-3" v.form="photo" type="file" @change="uploadProfile">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">   
                                Room Name:
                            </div>
                            <div class="col-md-9">
                                 <input v-model="form.type" type="text" name="type"
                                                class="form-control text-capitalize" :class="{ 'is-invalid': form.errors.has('type') }">
                                            <has-error :form="form" field="type"></has-error>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                Room Price:
                            </div>
                            <div class="col-md-3">
                                <input v-model="form.price" type="number" name="price"
                                                class="form-control text-capitalize" :class="{ 'is-invalid': form.errors.has('price') }">
                                <has-error :form="form" field="price"></has-error>
                            </div>
                            <div class="col-md-1">
                                Guests:
                            </div>
                            <div class="col-md-5">
                                <select name="" id="" v-model="form.guests" class="form-control" :class="{ 'is-invalid': form.errors.has('guests')}">
                                    <option disabled selected value="">Select # of Guests</option>
                                    <option v-for="(maxGuests, index) in maxGuests" :key="index"  :value="index+1">{{index+1}}</option>
                                </select>
                                
                                 <has-error :form="form" field="guests"></has-error>
                                
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                Room Amenities:
                            </div>
                            <div class="col-md-9">
                                <!-- <select style="width:300px;" class="form-control" name="" id="">
                                    <option value="" disabled selected>Select Amenities</option>
                                </select> -->
                                <multiselect v-model="form.value" tag-placeholder="Add this as new tag" placeholder="Select Amenities" label="name" track-by="code" :options="amenitiesList" :multiple="true" :taggable="true" @tag="addTag"></multiselect>
                                
                                <!-- <pre class="language-json"><code>{{ value  }}</code></pre> -->
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                Room Decription:
                            </div>
                            <div class="col-md-9">
                                <textarea v-model="form.description" class="form-control" name="" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>

        
        <!-- Modal photo-->
    <form @submit.prevent="savePhoto">
        <div class="modal fade " id="photoModal" style="z-index:9999" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" v-show="!editImage">Add More Image for <label class="text-primary">{{ room_name }}</label></h5>
                        <h5 class="modal-title" v-show="editImage">Delete Image in <label class="text-primary">{{ room_name }}</label></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <!-- add Image -->
                    <div class="modal-body" v-show="!editImage">
                        <vue-dropzone ref="myVueDropzone" id="dropzone"  :options="dropzoneOptions"></vue-dropzone>
                        <input type="hidden" v-model="room_id" id="">
                    </div>

                <!-- delete image -->
                     <div class="modal-body" v-show="editImage">
                        <input type="hidden" v-model="room_id" id="">
                        
                        <div class="row justify-content-center " id="container" >
                            <div class="col-2 mt-2" v-for="roomImages in roomOtherImage" :key="roomImages.id">
                                    <div  style="position:relative;" :id="roomImages.id" >
                                        <button type="button" class="close AClass  " aria-label="Close" @click="RemoveMoreImage(roomImages.id)">
                                        <span aria-hidden="true" class="badge badge-danger text-white rounded-circle">&times;</span>
                                        </button>
                                         <span class="tooltip">Tooltip text</span>
                                        <img  :src="'img/rooms/'+roomImages.image" class="img-thumbnail img-fluid moreimage"  >
                                       
                                    </div>
                            </div>
                        </div>
 
                    </div>
                    <div class="modal-footer ">
                        <div class="row w-100">
                            <div class="col-6" >
                                 <label for="" v-show="editImage" ><span>Reminder: </span><i class="text-danger">Every Message You Delete can't be Recover </i></label>
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"  v-show="editImage">Close</button>
                                <button type="submit" class="btn btn-primary"  v-show="!editImage" >Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" v-show="!editImage"   @click="removeImage">Close</button>
                            </div>
                        </div>
                      
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
                dropzoneOptions: {
                    url: 'https://httpbin.org/post',
                    thumbnailWidth: 150,
                    maxFilesize: 0.5,
                    addRemoveLinks: true,
                    dictDefaultMessage: '<i class="fa fa-cloud-upload text-primary fa-lg"></i> <i></i> Click Or Drag images that you want to upload'
                },
                room_id:'',
                room_name:'',
                amenitiesList:[],  

                maxGuests:10,
                roomDetails:{},
                roomOtherImage:{},
                editPhoto:false,
                editPic: false,
                editImage:false,
                url: null,
                editMode: false,
                form: new Form({
                    photo:'',
                    type:"",
                    price:'',
                    value: [],
                    roomID:"",
                    description:"",
                    currentPhohto:"",
                    guests:""

                }),

                room: new Form({
                   photo:'',
                }),

                formPhoto : new Form({
                    photo : []
                })

                
            }
        },
        methods:{
            loadRoom(page = 1){
                axios.get('api/rooms?page='+page)
                .then(({data}) => {
                    this.roomDetails = data  
                });
            },
            openModalAddRoom(){
                this.url = null;
                this.editMode = false; 
                this.editPic = false;
                this.form.reset();
                this.form.clear();
                $('#addRoomModal').modal('show');
                  
            },
            createRoom(){
                // console.log(this.form.guests);
                this.form.post('api/rooms')
                .then((data) => {
                    Toast.fire({
                        type: 'success',
                        title: 'Record Successfully Added'
                    }) 
                    Fire.$emit('AfterCreate');
                    $('#addRoomModal').modal('hide');    
                })
                .catch(() => {

                })
            },

            editRoomModal(id){
                this.form.clear();
                this.form.reset();
                this.editMode = true;
                this.editPic = true;
                this.url = null;
                this.form.roomID = id;
                $('#addRoomModal').modal('show'); 
                axios.get('api/rooms/'+id)
                .then((data) => {
                    this.form.type = data.data.type;
                    this.form.price = data.data.price;
                    this.form.description = data.data.description;
                    this.form.currentPhohto = data.data.photo;
                    this.form.guests = data.data.guests;
                    data.data.room_amenities.forEach(element => {
                        
                        this.form.value.push({
                            name : element.amenities,
                            code : element.amenities_id 
                        })
                    });
                    // console.log(this.value);
                })
                .catch(() => {

                });                        
            },

            updateRoom(){
               this.form.put('api/rooms/'+this.form.roomID)
               .then((data) => {
                //    console.log(data.data);
                    Fire.$emit('AfterCreate');
                    Toast.fire({
                        type: 'success',
                        title: 'Record Update'
                    })
                    $('#addRoomModal').modal('hide'); 
               })
               .catch(() => {

               })
            },
            

            uploadProfile(e){
               
                let file = e.target.files[0];
                this.url = URL.createObjectURL(file);
                let reader = new FileReader();
                reader.onloadend = (file) => {
                    this.form.photo = reader.result;
                }
                reader.readAsDataURL(file);
            },

            addTag(){
                axios.post('api/amenitiesList').then(({data}) => {
                    data.forEach(element => {
                        this.amenitiesList.push({
                            name: element.amenities,
                            code : element.id
                        });
                    });
                });
            },

            photoModal(id,name){
                this.editImage = false;
               $('#photoModal').modal('show');
                this.room_id = id
                this.room_name = name
            },

            //delete image
            deletePhotoModal(id,name){
                axios.get('api/imageroom/'+ id)
                .then(({data}) => {
                     if(data.length == 0 ){
                       Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'No Image To be Deleted !'
                            })
                    }else{
                            $('#photoModal').modal('show');
                            this.roomOtherImage = data;
                            this.editImage = true;
                            this.room_id = id
                            this.room_name = name
                      
                    }
                     

                       
                    
                });
            },
            
            uploadOtherImg(e){
                let file = e.target.files[0];
                this.url = URL.createObjectURL(file);
                let reader = new FileReader();
                reader.onloadend = (file) => {
                    this.room.photo = reader.result;
                }
                reader.readAsDataURL(file);
            },

            savePhoto(){
                this. editPic = false;
               var room_id = this.room_id;
                var image = [];
               var files = this.$refs.myVueDropzone.getAcceptedFiles();


               files.forEach(element => {
                   image.push(element.dataURL);
               })
               
               axios.post('api/roomimages', { image : image,  room_id : room_id  }).then(({data})=>{
               Fire.$emit('AfterCreate');
                    Toast.fire({
                        type: 'success',
                        title: 'Upload Images Succesfully'
                    })
                    $('#photoModal').modal('hide'); 
                     this.$refs.myVueDropzone.removeAllFiles();
              
               });
            },
            removePhoto(){
                     this.editImage = false;
                $('#photoModal').modal('show');
               
            },
            removeImage(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "It may reset all the Image/s the you upload recently",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Close it!'
                    }).then((result) => {
                    if (result.value) {
                          this.$refs.myVueDropzone.removeAllFiles();
                    }
                    })
            },
            RemoveMoreImage(id){
               axios.get('api/deleteroomImage/'+id+'/'+this.room_id)
                        .then(({data}) => {
                          
                            if(data < 1 ){
                                 Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'No Image To be Deleted !'
                                })
                                    $('#photoModal').modal('hide');
                            }else{
                                Toast.fire({
                                type: 'success',
                                title: 'Delete Successfully'
                                }),
                                 $('#'+id).hide(); 
                            }
                           
                        });
            
            }
        
        },
        mounted() {
            this.loadRoom();
            this.addTag();
       
            Fire.$on('AfterCreate',() => {
                this.loadRoom();
            })
         
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>
    @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");


.AClass{
  position: absolute;
  z-index: 1;
  right: 5px;
  top:5px;
}
img {
  position: relative;
  width: 100%;
}
.AClass span {
    box-shadow: #2c3e50;
    color: black; 
    }

</style>