<template>
    <div class="container-fluid">
        <div class="row p-0">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <div class="row ">
                                        <label for="">Report</label>
                            </div>
                        </div>
                
                    </div>
                        <div class="card-body " >
                          
                            <div class="row">
                                <div class="col-2 mt-2">
                                    <label for=""> Filter by:</label>
                                </div>
                                 <div class="col-md-4">
                                     <input type="text" class="form-control" placeholder="Client Name" v-model="filterName" @keyup="filterByName">
                                </div>
                                <div class="col-md-1 text-center ml-auto mt-2 p-0">
                                        <label for="">Or</label>
                                </div>
                                 <div class="col-md-5">
                                     <vue-monthly-picker v-model="selectedMonth"
                                    dateFormat="YYYY/MM"
                                    placeHolder="SELECT MONTH & YEAR" 
                                    :clearOption="true" 
                                    alignment="center"
                                    @selected="selectMonth()" 
                                    :monthLabels=monthLabels
                                    ></vue-monthly-picker>
                                </div>
                               
                            </div>
                            <table class="table  text-center">
                                <thead >
                                    <tr>
                                        <th>Client name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Check out Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <tr v-if="no_data < 1">
                                      <td colspan="5" class="jumbotron">  No data found</td>
                                    </tr>
                                    <tr  v-for="report in payment_report.data" :key="report.id">
                                        <td scope="row">{{ report.reservations.customer.name }}</td>
                                        <td>{{ report.amount }}</td>
                                        <td>{{ report.reservations.status }}</td>
                                       <td>{{ report.reservations.departure }}</td>
                                        <td>
                                           <span @click="showdetail(report.id)" class="badge badge-success p-1"><i class="fa fa-eye" aria-hidden="true"></i> View</span>  
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                             <pagination class="mt-2 mr-4" :data="payment_report" @pagination-change-page="loadReport"  size="small" align="right">
                                <span slot="prev-nav">&lt; Previous</span>
                                <span slot="next-nav">Next &gt;</span>
                            </pagination>
                        </div>
                </div>
            </div>

            <div class="col-md-6">
                    <show-report ref="reportDetails"></show-report>
            </div>
        </div>
    </div> 
</template>

<script>
import VueMonthlyPicker from 'vue-monthly-picker'

    export default {
        components: {
        VueMonthlyPicker
    },
        data(){
            return {
                filterName:'',
                no_data:0,
                payment_report:{},
                reservation:{},
                selectedMonth:'',
                monthLabels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            }
            
        },

        methods:{
          loadReport(page = 1){
                axios.get('api/reports?page='+page)
                .then(({data}) => {
                    console.log(data.data);
                   this.no_data = data.data.length;
                   this.payment_report = data
                  
                });
            },
           
            showdetail(val){
                  this.$refs.reportDetails.returnId(val)
            },
            selectMonth(){
              if(this.selectedMonth == null){
                            this.loadReport();
                }else{
                 axios.get('api/reportmonth/' + this.selectedMonth._i)
                .then(({data}) => {

                     this.no_data = data.data.length;
                    this.payment_report = data
                });
                }
            },
            filterByName(){
                if(this.filterName == ''){
                            this.loadReport();
                }else{
                     axios.get('api/filterbyname/' + this.filterName)
                .then(({data}) => {
                    console.log(data);
                    this.no_data = data.data.length;
                    this.payment_report = data
                });
                }

               
            }
           
        },
        created() {
            this.loadReport();
            console.log('Component mounted.')
             
        }
       
    }
</script>
<style>
    .text{
        display: none; 
    }
</style>
