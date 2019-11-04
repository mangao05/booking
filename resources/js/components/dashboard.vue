<template>
    <div class="container-fluid">
           <div class="card card-background" data-aos="zoom-in-left"  data-aos-duration="4000" >
               <div class="row">
                   <div class="col-6">
                          
                   </div>
                   <div class="col-6">
                         <div class="mt-5">
                            <h1><span class="welcome"> Welcome Back &nbsp;</span><span class="userName text-uppercase" >{{ userprofile.firstname }}</span></h1> 
                        </div>
                   </div>

               </div>
            
            </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row ">
                      <div class="col-md-6 " data-aos="zoom-in-down" data-aos-duration="2000">
                        <div class="info-box boxType">
                            <div class="ribbon-wrapper  ">
                                <div class="ribbon bg-secondary text-bold text-white">
                                    Reserved
                                </div>
                            </div>
                            <span class="info-box-icon bg-secondary p-3"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span>
                            <div class="info-box-content ">
                                <span class="info-box-text"><br></span>
                                <span class="info-box-number">
                                    <number ref="number1"
                                    :from="0"
                                    :to="this.reservedClient"
                                    :duration="1"
                                    easing="Power1.easeOut"/>
                                </span>
                                <div class="progress">
                                <div class="progress-bar  bg-secondary" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                 <label for=""> Total Number of Reservation of Client </label> 
                                </span>
                            </div>
                        </div>
                    </div>
                    
                      <div class="col-md-6" data-aos="zoom-in" data-aos-duration="2000"> 
                        <div class="info-box boxType">
                            <div class="ribbon-wrapper ">
                                <div class="ribbon bg-success  text-bold">
                                    Booked
                                </div>
                            </div>
                            <span class="info-box-icon bg-success"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text"><br></span>
                                <span class="info-box-number">
                                     <number ref="number1"
                                    :from="0"
                                    :to="this.bookedClient"
                                    :duration="1"
                                    easing="Power1.easeOut"/>
                                </span>
                                <div class="progress">
                                <div class="progress-bar bg-success" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                    Total Number Of Cilent that Booked
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                     <div class="col-md-6 " data-aos="zoom-in-down"  data-aos-duration="2000">                  
                       <div class="info-box boxType" >
                            <div class="ribbon-wrapper ">
                                <div class="ribbon bg-purple text-bold">
                                    User
                                </div>
                            </div>
                            <span class="info-box-icon bg-purple"><i class="fa fa-users" aria-hidden="true"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text"><br></span>
                                <span class="info-box-number">
                                    <number ref="number1"
                                    :from="0"
                                    :to="this.user"
                                    :duration="1"
                                    easing="Power1.easeOut"/>
                                </span>
                                <div class="progress">
                                <div class="progress-bar bg-purple" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                    Total Number Of User
                                </span>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-6 " data-aos="zoom-in-down" data-aos-duration="2000">
                       <div class="info-box boxType">
                            <div class="ribbon-wrapper  ">
                                <div class="ribbon bg-info  text-bold">
                                    Message
                                </div>
                            </div>
                            <span class="info-box-icon bg-info"><i class="fa fa-comments" aria-hidden="true"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text"><br></span>
                                <span class="info-box-number">
                                    <number ref="number1"
                                    :from="0"
                                    :to="this.message"
                                    :duration="1"
                                    easing="Power1.easeOut"/>
                                </span>
                                <div class="progress">
                                <div class="progress-bar bg-info" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                    Total Number Of Message
                                </span>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 bg-default">
                     <div class="chart">
                        <apexchart width="380" type="pie" :options="options" :series="series"  ></apexchart>
                    </div>
            </div>

            <div class="row pl-5 pr-5">
               
                <div class="col-md-12 col-sm-12 mt-3 calendar">
                        <label for="" class="text-center w-100">Calendar</label>
                         <full-calendar  :config="config"> </full-calendar>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
  AOS.init();


    export default {
        data(){
            return {
                 config: {
                      plugins: [ 'dayGrid' ],
                    defaultView: 'dayGridMonth'
                    
                 },
                
                user:'',
                room:'',
                reservedClient:'',
                bookedClient:'',
                message:'',
                userprofile:{},  
                roomsss:{},     
                options: {
                    labels: [],
                   
                    colors: ['#2E93fA', '#66DA26', '#546E7A', '#E91E63', '#FF9800'],
                },
                series: [],
                test:{}
              
            
            }
        },

        methods:{  
           
            loadUser(){
                axios.get('api/employee')
                .then(({data}) => {
                    this.user = data.data.length;
                })
            },
            loadReservedClient(){
                axios.get('allinreserved')
                .then(({data}) => {
                    this.reservedClient=  data.length ;
                });
            },
             loadBookedClient(){
                axios.get('bookedclient')
                .then(({data}) => {
            
                    this.bookedClient =  data.length ;
                });
            },
             loadMessage(){
                axios.get('api/contactCount')
                .then(({data}) => {
                    this.message = data.length;
                });
            
            },
            userProfile(){
                 axios.get('api/fetchprofile')
                .then(({data}) => {
                    this.userprofile = data;
                });
            
            },
            roomType(){
                var roomname = [];
                 axios.get('api/roomname')
                .then(({data}) => {
                    this.roomsss = data;
                    console.log(data);
                    data.forEach(element => {
                             this.series.push(element.total_booking);
                               this.options.labels.push(element.type);

                    });
                                  
                });
            },
            playAnimation() {
                this.$refs.number1.play()
                }
            },


            created() {
                this.loadUser();
                this. loadMessage();
                this.loadReservedClient();
                this.userProfile();
                this.loadBookedClient();
                console.log('Component mounted.')    
            },
            mounted(){
                 this.roomType();
            }
       
    }


</script>
<style scoped>
@import url('https://fonts.googleapis.com/css?family=Nosifer');
@import url('https://fonts.googleapis.com/css?family=Spicy+Rice');

    .boxType{
       -webkit-box-shadow: -7px -5px 11px -3px rgba(168,165,168,1);
        -moz-box-shadow: -7px -5px 11px -3px rgba(168,165,168,1);
        box-shadow: -7px -5px 11px -3px rgba(168,165,168,1); 
        border: 1px solid rgba(168,165,168,1); ;
    }
    .card-background{
        min-height: 20vh !important;
        background-image: url('/img/card-background.png');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        width: 100%;
        height: 100%;
    }
    .welcome{
    font-family: "Spicy Rice", cursive;
    font-weight: bold;
    text-align: center;
    font-size: 36px;
    letter-spacing: 4px;
    word-spacing: -4px;
    color: #67C392;
    text-shadow: rgba(76, 110, 235, 0.85) -3px -3px 2px;
    }
    .userName{
         font-family: Nosifer, cursive;
        font-weight: bold;
        text-align: center;
        font-size: 36px;
        letter-spacing: 4px;
        word-spacing: -4px;
        color: #F9F5F3;
        text-shadow: rgba(48, 94, 232, 0.85) -3px -3px 2px;
    }
    .chart{
        border: 1px solid #6F42C1;
         box-shadow:5px 5px #DBADEC;
         position: relative;
    }
    .calendar{
        border:1px solid #605ca8;
    }
   .fc-unthemed td.fc-today{
       background-color: red !important;
   }
</style>
