<template>
    <div class="container">
        <mesaiitem-component @add="ekle" title="Pazartesi" day="pazartesi"  v-bind:data="pazartesi"></mesaiitem-component>buradaki v-bind:data içersindeki degerler aşağıda tanımlanmış dizilerdir.componente gonderdik props ile hedef compenentte aktarımını yaptıktan sonra kullanabiliriz.
        <mesaiitem-component @add="ekle" day="sali" title="Salı" v-bind:data="sali"></mesaiitem-component>
        <mesaiitem-component @add="ekle" day="carsamba" title="Çarşamba" v-bind:data="carsamba"></mesaiitem-component>
        <mesaiitem-component @add="ekle" day="persembe" title="Perşembe" v-bind:data="persembe"></mesaiitem-component>
        <mesaiitem-component @add="ekle" day="cuma" title="Cuma" v-bind:data="cuma"></mesaiitem-component>
        <mesaiitem-component @add="ekle" day="cumartesi" title="Cumartesi" v-bind:data="cumartesi"></mesaiitem-component>
        <mesaiitem-component @add="ekle" day="pazar" title="Pazar" v-bind:data="pazar"></mesaiitem-component>
        <button @click="kaydet" class="btn btn-success">Kaydet</button>
    </div>

</template>

<script>
    export default {
        data(){
            return{
                pazartesi:[],
                sali:[],
                carsamba:[],
                persembe:[],
                cuma:[],
                cumartesi:[],
                pazar:[]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            axios.get('http://127.0.0.1:8000/api/calisma-list',{
                       
                        
                        
                    }).then((cevap)=>{
                        
                          for (var i = 0; i < cevap.data.length; i++)
                         {
                             if(cevap.data[i].day==1){this.pazartesi.push(cevap.data[i].hours);}
                             if(cevap.data[i].day==2){this.sali.push(cevap.data[i].hours);}
                             if(cevap.data[i].day==3){this.carsamba.push(cevap.data[i].hours);}
                             if(cevap.data[i].day==4){this.persembe.push(cevap.data[i].hours);}
                             if(cevap.data[i].day==5){this.cuma.push(cevap.data[i].hours);}
                             if(cevap.data[i].day==6){this.cumartesi.push(cevap.data[i].hours);}
                             if(cevap.data[i].day==7){this.pazar.push(cevap.data[i].hours);}
                         }
                         console.log(this.pazartesi);

                    });

            
        },
        methods:{
           ekle:function(data){
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
