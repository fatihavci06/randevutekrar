<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{title}}</div>
                    <div class="card-header">
                        
                            <input class="form-control" type="text" v-model="zaman">
                            <button class="btn btn-success" @click="ekle">Ekle</button>
                        

                    </div>
                        
                    <div class="card-body">
                        <p v-for="item in data">{{item}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                pazartesi:[],
                sali:[],
                carsamba:[],
                persembe:[],
                cuma:[],
                cumartesi:[],
                pazar:[],
                zaman:''
            }
        },
        methods:{
            ekle:function(){

                this.$emit('add',{text:this.zaman,day:this.day});
                console.log(this.pazartesi);
                this.zaman=''
            },
        },
         props:['title','day','data']
    }
</script>