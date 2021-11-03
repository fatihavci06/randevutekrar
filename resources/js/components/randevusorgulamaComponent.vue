<template>
    <div class="container">
    <div >
    <div class="row"  style="text-align:center;"><h3>Randevu Takip Sistemi</h3>
    <h3>Randevularını görmek için bilgileri doğru giriniz</h3></div>
    <div class="row">
            <div class="form-group">
                <ul>
                    <li style="color:red;" v-for="i in errors" >{{i}}</li>
                </ul>
            </div>
            </div>

        <div class="row justify-content-center">
          
            <div class="col-md-12 ">
                <div class="form-group">
                <input type="text" class="form-control" v-model="code" placeholder="Randevu Kodu">
                </div>
            </div>
            
           
            
            
           
            <div class="col-md-12 " style="text-align: center;">
                <div class="form-group">
                    <button v-on:click="store" class="btn btn-success">Randevu Ara</button>
                </div>
            </div>
            <div v-if="formcomplete">
                <div class="row">
                    <div class="col-md-12">
                        İsim:{{data.fullname}}
                    </div>
                    <div class="col-md-12">
                       Tarih:{{data.date}}
                    </div>
                    <div class="col-md-12">
                       Saat:{{saat.hours}}
                    </div>
                    <div class="col-md-12">
                       Bildirim:<span v-if="data.notification_type==0">Sms</span>
                       <span v-if="data.notification_type==1">Mail</span>
                    </div>
                    <div class="col-md-12">
                        NOTLAR
                    </div>
                    <div class="col-md-12" v-if="not" v-for="item in not">
                        {{item.text}}
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
                code:'',
                formcomplete:false,
                errors:[],
                data:[],
                not:[],
                saat:[],
                bildirim:'',

            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            store:function(){
                if(this.code!=''){
                    axios.post('http://127.0.0.1:8000/api/randevu-hasta-ekrani',{
                            code:this.code,
                        })
                       .then((cevap)=>{
                            this.errors=[];
                           
                           if(cevap.data.status===false){
                            this.errors.push(cevap.data.Message);
                           }
                           if(cevap.data.status===true){
                            this.data=cevap.data
                            this.not=cevap.data.randevunotu;
                            this.saat=cevap.data.saatadi;
                            this.formcomplete=true;
                             console.log(cevap.data);
                           }

                           
                       })
                }
                if(this.code==''){
                    this.errors.push('takip numarası giriniz');
                
                }
            }
        }
    }
</script>
