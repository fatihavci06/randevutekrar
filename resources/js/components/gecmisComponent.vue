<template>
    
        <div class="row">
        <div class="col-md-4 mt-4" v-for="(item,index) in data.data" :key="index">
            <div class="card" @click="ac(item.id)">
                <div class="card-header">Ad ve Soyad :{{item.fullname}}</div>



                <div class="card-body">
                   <p>Telefon : {{item.phone}}</p>
                   <p>E-mail :{{item.email}}</p>
                   <p>Randevu Tarihi : {{item.date}}</p>
                   <p>Randevu Saati : {{item.saatadi.hours}}</p>
                </div>
            </div>
            
        </div>
        <pagination align="center" :data="data" @pagination-change-page="list"></pagination>
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
                    default:null
                }
            }
        },
        mounted(){
            this.list()
        },
        methods:{
            async list(page=1){
                await axios.get(`/api/gecmisrandevu?page=${page}`).then(({data})=>{
                    this.data = data
                }).catch(({ response })=>{
                    console.error(response)
                })
            },
            ac:function (id) {
                this.modalid=id;
               this.visible=true;
               
            }
        }
    }
    
</script>
<style scoped>
    .pagination{
        margin-bottom: 0;
    }
</style>