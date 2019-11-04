<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <div class="row">
                            <table class="table">
                                <tr>
                                    <th>question</th>
                                    <th colspan="5">answer</th>
                                </tr>
                                <tbody>
                                    <tr v-for="data in questions" :key="data">
                                        <td>{{data}}</td>
                                        <td v-for="n in 5" :key="n">
                                            <div>
                                                <input type="radio" class="choice" @click="answer(n,data)" :value="n" :name="data">{{n}}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            average = {{pick}}
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
                questions:{},
                avg: 0,
                pick: 0,
               List:{},
                status:''
            }
        },
        methods:{
            loadQuestion(){
                axios.get('api/question')
                .then(( {data} ) => {this.questions = data
                    
                })
                
            },
            
            answer(ans,id){
                var sum = this.pick + parseInt(ans);
                this.pick = sum;
                // console.log(ans+"-"+id);
                console.log(this.pick);
                
            }
        },
        created(){
            this.loadQuestion();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
