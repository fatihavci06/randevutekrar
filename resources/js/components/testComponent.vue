<template>
   <div id="app">
       <testitem-component @add="add" title="Pazartesi" day="pazartesi" :data="pazartesi"></testitem-component>
       <testitem-component @add="add" title="Salı" day="sali" :data="sali"></testitem-component>
       <testitem-component  @add="add" title="Çarşamba" day="carsamba" :data="carsamba" ></testitem-component>
       <testitem-component @add="add" title="Perşembe" day="persembe" :data="persembe"></testitem-component>
       <testitem-component @add="add" title="Cuma" day="cuma" :data="cuma"></testitem-component>
       <testitem-component @add="add" title="Cumartesi" day="cumartesi" :data="cumartesi"></testitem-component>
       <testitem-component @add="add" title="Pazar" day="pazar" :data="pazar"></testitem-component>
       <button @click="kaydet" class="btn btn-success">Kaydet</button>
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
            add:function(data){
                this[data.day].push(data.text);
            },
            kaydet:function(){
                axios.post('http://127.0.0.1:8000/api/calisma-saati-ekle',{
                        pazartesi:this.pazartesi,
                        sali:this.sali,
                        carsamba:this.carsamba,
                        persembe:this.persembe,
                        cuma:this.cuma,
                        cumartesi:this.cumartesi,
                        pazar:this.pazar,
                        
                        
                    }).then((cevap)=>{
                        
                           console.log(cevap);

                    })
            },
        }
    }
</script>
