
<template>
    <div class="container">
        <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-7">
                                        <label for="">Customer Details</label>
                                </div>
                                <div class="col-5 float-right">
                                        <label for="">Reservation No:</label>   {{ reservation_id }}
                                </div>
                            </div>
                        
                        </div> 
                        <div class="card-body jumbotron-fluid show" v-if="this.customer_name == 'N/A'" >
                            <div class="mt-3">
                                <div class="text-center">
                                        <img src="/img/customer_details.jpg" alt="" class="image-fluid"> 
                                    
                                </div>
                                <div class="text-center">
                                    <span>Click</span>   <span class="badge badge-success p-1"> <i class="fa fa-eye" aria-hidden="true"></i> view</span> <span>To View Customer details</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"  v-else>
                            <div v-if="loading" class="loading"  >
                                <Circle8 style="height:300px;" ></Circle8>
                            </div>

                            <div v-else>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Transaction No:</label>
                                    </div>
                                    <div class="col-6">
                                        {{ transaction_id }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Room No:</label>
                                    </div>
                                    <div class="col-6">
                                        {{ room_no }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Client Name: </label>
                                    </div>
                                    <div class="col-6">
                                        {{ customer_name }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Contact Number: </label>
                                    </div>
                                    <div class="col-6">
                                        {{ customer_no }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Paypal Fee: </label>
                                    </div>
                                    <div class="col-6">
                                        {{ payment_fee }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Check In: </label>
                                    </div>
                                    <div class="col-6">
                                        {{ check_in | moment("MMMM Do YYYY")}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Check Out: </label>
                                    </div>
                                    <div class="col-6">
                                        {{ check_out | moment("MMMM Do YYYY")}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Arrival Date & Time: </label>
                                    </div>
                                    <div class="col-6">
                                        {{ arrival | moment("dddd, MMMM Do YYYY, h:mm:ss a")}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Departure Date & Time: </label>
                                    </div>
                                    <div class="col-6">
                                        {{ departure  | moment("dddd, MMMM Do YYYY, h:mm:ss a")}}
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
                reservation:{},
                room_no:'N/A',
                reservation_id:'N/A',
                transaction_id:'N/A',
                check_in:'N/A',
                check_out:'N/A',
                payment_fee:'N/A',
                customer_name:'N/A',
                customer_no:'N/A',
                arrival:'N/A',
                departure:'N/A',
                loading:false
            }
        },
        methods : {
            returnId(val){
                this.loading = true;
                 axios.get('api/reports/'+val)
                .then(({data}) => {
                    this.reservation = data;
                    this.room_no = data.reservations.room_no;
                    this.reservation_id = data.reservation_id;
                    this.transaction_id = data.transaction_id;
                    this.check_in = data.reservations.check_in;
                    this.check_out = data.reservations.check_out;
                    this.payment_fee = data.paypal_fee;
                    this.customer_name = data.reservations.customer.name;
                    this.customer_no = data.reservations.customer.contact_no;
                    this.arrival =  data.reservations.arrival;
                    this.departure =  data.reservations.departure;
                });
                 this.loading = false;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>
      .loading{
        margin:0 auto;
        width: 10%;
        padding: 10px;
    }
</style>
