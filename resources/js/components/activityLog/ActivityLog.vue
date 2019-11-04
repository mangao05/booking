<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><label for=""> Activity Log </label></div>
                    <div class="card-body">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Activity</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr v-for="(activity,index) in change.data" :key="activity.id">
                                      <td>{{ index + 1}}</td>
                                      <td >{{ activity.log_name }} has <span  class="text-capitalize"> {{ activity.description }} </span> action in <span class="text-primary" @click="showChange(activity.id)">{{ activity.subject_type}}</span>  </td>
                                        
                                  </tr>
                              </tbody>
                          </table>
                            <pagination class="mt-2 mr-4" :data="change" @pagination-change-page="loadActivity"  size="small" align="right">
                                    <span slot="prev-nav">&lt; Previous</span>
                                    <span slot="next-nav">Next &gt;</span>
                            </pagination>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="updated" v-if="description =='updated'">
                     <div class="row">
                      <div class="col-md-12">
                            <div class="card ">
                                <div class="card-header">New</div>
                                <div class="card-body">
                                    {{ new_data  }}
                                </div>
                            </div>
                      </div>
                  </div>
                    <div class="row">
                      <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Old  </div>
                                <div class="card-body">
                                    <p class="card-text">test</p>
                                </div>
                            </div>
                      </div>
                  </div>
                </div>
                
                <div  class="created" v-else-if="description =='created'">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Detials  </div>
                                    <div class="card-body">
                                        <p class="card-text">test</p>
                                    </div>
                                </div>
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
            return{
                description:'',
                change:{},
                new_data:{},
                old_data:{}
            }
        },

        methods:{
            loadActivity(page = 1){
                axios.get('api/activity?page='+page)
                .then(({data})=> {
                    this.change = data;
                })
            },
            showChange(id){
                axios.get('api/activity/'+id)
                .then(({data})=> {
                    this.description = data.description
                    console.log(data.description);
                    this.new_data = data.properties.attributes;
                    
                    // this.old_data = data.properties.old;
    
                })

            }
        },
        created(){
            this.loadActivity();
        },
        mounted() {
           
        }
    }
</script>
