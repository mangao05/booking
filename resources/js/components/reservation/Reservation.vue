<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><label for="">Reservation</label></div>
                        <div class="card-body " >
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Client Name</th>
                                        <th>Room #</th>
                                         <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="customer in customer_details" :key="customer.key">
                                       <td scope="row">{{ customer.customer.name }}</td>
                                        <td>{{ customer.room_no }}</td>
                                        <td>{{ customer.paypal_payments[0].amount }}</td>
                                        <td>
                                        <span v-if="customer.status == 'Check in'" class="text-success" >{{ customer.status }}</span>
                                         <span v-else-if="customer.status == 'Reserved'" class="text-primary" >{{ customer.status }}</span>
                                        <span v-else class="text-danger"> {{ customer.status }}</span>
                                        </td>
                                        <td>
                                            <span  class="badge badge-warning p-1" v-if="customer.status == 'Check in'"   @click="updateStatus(customer.id,'Done',customer.customer.name,)">Check Out</span>   
                                           <span   class="badge badge-primary p-1" v-else  @click="updateStatus(customer.id,'Check in',customer.customer.name,)">Check In</span>  
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
    export default {
        data(){
            return {
                check_in:true,
                customer_details:{},
                amount:'',

            }
        },

        methods:{
            loadCustomer(){
            
                axios.get('reservation')
                .then(({data}) => {
                    this.customer_details = data;
                  
               
                });
            },
            updateStatus(val,check,name){
               
                axios.get('updateCheckStatus/'+val+'/'+check)
                .then(({data}) => {
                    Fire.$emit('AfterCreate');
                    Toast.fire({
                        type: 'success',
                        title: name +' '+'Successfully' +' ' + data
                    })
                    console.log(data);
                    
                });
            }
        },
        created() {
            this.loadCustomer();
             Fire.$on('AfterCreate',() => {
                 this.loadCustomer();
             })
        }
    }
</script>
