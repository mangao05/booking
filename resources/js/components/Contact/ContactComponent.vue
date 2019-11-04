
<template>
    <div class="container">
     
        <div class="card">
               
                    <div class="card-header">
                                    <label for="">Message Details</label>
                        </div> 
                        <div class="card-body jumbotron-fluid show" v-if="this.name == ''" >
                            <div class="mt-5">
                                <div class="text-center">
                                        <img src="/img/message_icon.png" alt="" class="image-fluid"> 
                                    
                                </div>
                                <div class="text-center">
                                    <span>Click</span>   <span class="badge badge-primary p-2"> <i class="fa fa-eye" aria-hidden="true"></i> Show</span> <span>To View details</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"  v-else>
                            <div v-if="loading" class="loading" >
                                <Circle8 style="height:300px;" ></Circle8>
                            </div>
                            <div v-else>
                                 <div class="row pl-3 ">
                               <h5>
                                   <label for=""><i class="fa fa-user nav-icon text-primary" aria-hidden="true"></i> From :</label> <span>&nbsp;{{ name }} </span> 
                               </h5>              
                            </div>
                            <div class="row pl-3">
                                <h5>
                                     <label for=""><i class="fa fa-envelope text-primary" aria-hidden="true"></i> Email Address :</label> <span>&nbsp;{{ email }}</span> 
                                </h5>     
                            </div>
                             <div class="row pl-3">
                                 <h5>
                                        <label for=""><i class="fa fa-phone-square text-primary" aria-hidden="true"></i> Contact Number :</label> <span>&nbsp;{{ number }}</span>
                                 </h5>
                                           
                            </div>

                            <div class="row pl-3">
                                  <h5>
                                        <label for=""><i class="fa fa-comments text-primary" aria-hidden="true"></i> Message :</label>
                                    <span  class="pl-5"> 
                                        
                                       <textarea class="message" name="" id="" cols="50" rows="10" :value="message" disabled></textarea>
                                    </span>   
                                 </h5>
                                           
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
                name:'', 
                email:'',
                number:'',
                message:'',
                loading: false,
            }
        },
        methods : {
           messageDetais(id){
               this.loading = true;
               axios.get('api/contactus/'+id)
                .then(({data}) => {
                        
                        this.name = data.name,
                        this.email = data.email,
                        this.number = data.contact_number,
                        this.message = data.message
                        Fire.$emit('AfterCreate');
                });

                this.loading = false;
           },
            deleteMessage(id,name){
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to delete' +' '+ name +"'s"+' '+'message' ,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.value) {
                        axios.get('api/deleteContact/'+id)
                        .then(({data}) => {
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            ),
                            Fire.$emit('AfterCreate');
                        });
                       
                    }
                })
               
           }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>
    .message{
        color:black;
        background-color:transparent;
        border: none;
    }
    ::-webkit-scrollbar-thumb {
        background: gray; 
        border-radius: 10px;
    }
    ::-webkit-scrollbar {
        width: 2px;
    }
    .show{
        min-height: 430px;
    }
    .loading{
        margin:0 auto;
        width: 10%;
        padding: 10px;
    }
    
</style>