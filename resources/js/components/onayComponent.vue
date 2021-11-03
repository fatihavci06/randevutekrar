<template>
    
        <div class="row">
        <div class="col-md-4 mt-4" v-for="(item,index) in data.data" :key="index">
            <div class="card" @click="ac(item.id)" >
                <div class="card-header">Ad ve Soyad :{{item.fullname}}</div>
                 <div class="card-header">id :{{item.id}}</div>



                <div class="card-body">
                   <p>Telefon : {{item.phone}}</p>
                   <p>E-mail :{{item.email}}</p>
                   <p>Randevu Tarihi : {{item.date}}</p>
                   <p>Randevu Saati : {{item.saatadi.hours}}</p>
                </div>

            </div>

            <div class="container text-center mt-2">
            <button v-on:click="onayla(item.id)" class="btn btn-success col-md-4">Onayla</button>
            <button v-on:click="iptal(item.id)" class="btn btn-danger col-md-4">İptal</button></div>
        </div>
        
        <pagination align="center" class="mt-2" :data="data" @pagination-change-page="list"></pagination>
        <randevudetay-component :modal_id="modalid" v-if="visible" @close="visible=false"></randevudetay-component>
        </div>

    
    </template>

<script>
        import pagination from 'laravel-vue-pagination'
    export default {
        name:"users",
        components:{
            pagination
        },
        data(){
            return {
                 visible:false,
                 modalid:0,
                data:{
                    type:Object,
                    default:null,
                   
                }
            }
        },
        mounted(){
            this.list()
        },
        methods:{
            async list(page=1){
                await axios.get(`/api/onaybekleyenrandevu?page=${page}`).then(({data})=>{
                    this.data = data
                }).catch(({ response })=>{
                    console.error(response)
                })
            },
            onayla:function(id){
                axios.post('http://127.0.0.1:8000/api/durumdegistir',{
                        id:id,
                        type:2,
                        
                    }).then((cevap)=>{
                        
                         window.location.reload()

                    })
            },
            iptal:function (id) {
                axios.post('http://127.0.0.1:8000/api/durumdegistir',{
                        id:id,
                        type:1,
                    }).then((cevap)=>{
                         
                        window.location.reload()
                    })
            },
            ac:function (id) {
                this.modalid=id;
               this.visible=true;
               
            },

        }
    }
    
</script>
<style scoped>
    .pagination{
        margin-bottom: 0;
    }
</style>