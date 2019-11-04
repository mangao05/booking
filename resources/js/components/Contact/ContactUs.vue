<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-5">
                                  <label for=""> All Message</label>
                            </div>
                            <div class="col-7">
                                        <select class="form-control" name="" id="" v-model="filterMessage" @change="filter()">
                                          <option value="all" disabled selected>Select to Filter Message</option>
                                          <option value="">All</option>
                                          <option value="1">Read</option>
                                            <option value="0">Unread</option>
                                        </select>
                            
                            </div>
                        </div>
                      
                        </div>

                    <div class="card-body">
                        
                            <table class="table text-center ">
                               
                                <thead>
                                    <tr>
                                        <th>Sender Name</th>
                                        <th>Date Received</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr v-if="data_counter < 1">
                                      <td colspan="3" class="jumbotron">  No data found</td>
                                    </tr>
                                    <!-- unread -->
                                    <tr v-for="message in message_data.data" :key="message.id"  :class="(message.status == 0) ? 'message_design' :'' ">
                                        <td scope="row" >
                                             <span v-show="message.status == 1"><i class="fa fa-envelope-open text-primary" aria-hidden="true"></i></span>
                                            <span v-show="message.status == 0"><i class="fa fa-envelope text-success" aria-hidden="true"></i></span> &nbsp; {{ message.name }}
                                        </td>
                                        <td>{{ message.created_at | moment("MMMM Do YYYY") }}</td>
                                         <td >
                                           <span class="badge badge-primary" @click="messageDetais(message.id,message.status)"> <i class="fa fa-eye p-2" aria-hidden="true"></i>Show</span>
                                            <span class="badge badge-danger" @click="deleteMessage(message.id,message.name)"><i class="fa fa-trash p-2" aria-hidden="true"></i> Delete</span>
                                        </td>
                                    </tr>
                                   
                                </tbody> 
                            </table>
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                
                                   <label for="" >Total Message :</label>  <span>{{ total_message }}</span>
                                </div>
                                <div class="col-md-6">
                                    <pagination class="mt-2 mr-4" :data="message_data" @pagination-change-page="loadMessage"  size="small" align="right">
                                        <span slot="prev-nav">&lt; Previous</span>
                                        <span slot="next-nav">Next &gt;</span>
                                    </pagination>
                                </div>
                            </div>
                             
                    </div>
                    
                </div>
            </div>

            <div class="col-md-6">
             
                   <show-message ref="showMessage"></show-message>
            
            </div>
        </div>
    </div>
</template>

<script>
    
    export default {
        data(){
            return {
                status:'',
              data_counter:0,
              message_data:{},
              total_message:'',
              filterMessage:'all',
            }
            
        },

        methods:{  
            loadMessage(page = 1){
                axios.get('api/contactus?page='+page+'&filter='+this.filterMessage)
                .then(({data}) => {
                    this.data_counter = data.data.length;
                   this.message_data = data;
                   this.total_message = data.total;
                });
            
            },
            filter(){
                if(this.filterMessage == 'all' || this.filterMessage == '' || this.filterMessage == null ){
                    this.loadMessage()
                }else{
                    axios.get('api/filtercontact/'+this.filterMessage)
                        .then(({data}) => {
                            this.data_counter = data.data.length;
                            this.message_data = data;
                            this.total_message = data.total;        
                     });
                }
                  
                },  
            messageDetais(val,status){
                this.$refs.showMessage.messageDetais(val);
                axios.get('api/editContactStatus/'+val+'/'+status)
                .then(({data}) => {
                    $(".nav-item").load($(this).attr(to));
                });
            },
            deleteMessage(id,name){
                this.$refs.showMessage.deleteMessage(id,name);
            },
          
              
        },
        created() {
 
            this.loadMessage();
             Fire.$on('AfterCreate',() => {
                 this.loadMessage();
             })
            console.log('Component mounted.')
             
        }
       
    }


    
</script>
<style scoped> 
    .message_design{
        background-color: #C9C5BB;
    }
</style>