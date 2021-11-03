<template>
    <div class="container">
        <div v-if="!divdeger" class="row justify-content-center">
        <div class="col-md-12 ">
                <ul>
                <li v-for="item in errors">{{item}}</li>
                </ul>
            </div>
            <div class="col-md-12 ">
                <div class="form-group">
                <input type="text" class="form-control" v-model="name" placeholder="Ad Soyad">
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="form-group">
                <input type="text" class="form-control" v-model="email" placeholder="Email">
                </div>
            </div>
             <div class="col-md-12 ">
                <div class="form-group">
                <input type="text" class="form-control" v-model="phone" v-mask="'##-###-###-##-##'" placeholder="Phone">
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="form-group">
                <input type="date" v-on:change="SelectDate"  class="form-control" v-model="date" >
                </div>
            </div>
            <div class="col-md-12">
            <ul>
                <li  v-for="item in workingHours" v-if="item.isAktive"><input type="radio" v-model="saat" v-bind:value="item.id">{{item.hours}}</li>
            </ul>
            </div>
            <div class="col-md-12 ">
                <div class="form-group">
                <textarea v-model="text" cols="30" rows="10" id="" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Sms</label>
                        <input type="radio" v-model="notification_type" value="0">
                    </div>
                </div>
                <div class="col-md-4">
                     <div class="form-group">
                        <label>E-mail</label>
                         <input type="radio" v-model="notification_type" value="1">
                     </div>
                </div> 
            </div>
            <div class="col-md-12 ">
                <div class="form-group">
                    <button v-on:click="store" class="btn btn-success">Randevu Oluştur</button>
                </div>
            </div> 
             
            </div>
            
        </div>
        <div v-if="divdeger" class="col-md-12 ">
                <div class="form-group">
                    Randevu Oluşturuldu.
                </div>
            </div>
    </div>
</template>
<script src="/socket.io/socket.io.js"></script>
<script>

    export default {
     data(){
            return{
            errors:[],
            workingHours:[],
            saat:null,
            name:null,
            phone:null,
            email:null,
            notification_type:null,
            text:null,
            divdeger:false,
            date:new Date().toISOString().slice(0,10), //bugünün tarihini date değişkenine atadık. date değişkeninin geçtiği yerlerde bugünün tarihi yazcak
            }
        },
        methods:{
            SelectDate:function(){
                axios.get('http://127.0.0.1:8000/api/calisma-saatleri/'+this.date) //axios get ile servis apimizden veri çekiyoruz
               .then((cevap)=>{
                   this.workingHours=cevap.data; //controllerdan dönen datayı yukarıda tanımlamış olduğumuz workingHour içerisine attık.
                   console.log(cevap.data);
               })
            },
            store:function(){
            if(this.name && this.email && this.notification_type && this.validEmail(this.email) &&this.phone && this.saat)
                {
                    axios.post('http://127.0.0.1:8000/api/randevu-kaydet',{
                        fullname:this.name,
                        phone:this.phone,
                        email:this.email,
                        date:this.date,
                        workingHour:this.saat,
                        notification_type:this.notification_type
                    }).then((cevap)=>{
                         if(cevap.status){
                            this.divdeger=true;
                         }
                         console.log(cevap.data);
                    })
                    
                }
                this.errors=[];
                if(!this.name){
                    this.errors.push('İsim Soyisim girilmelidir');
                }
                if(!this.notification_type){
                    this.errors.push('Bildirim tipi seçilmelidir');
                }
                if(!this.email){
                    this.errors.push('Email girilmelidir');
                }
                else if (!this.validEmail(this.email)) {
                    this.errors.push('Email Formatı Doğru Olmalı.');
                }
                if(!this.phone){
                    this.errors.push('Telefon numarası girilmelidir');
                }
                if(!this.saat){
                    this.errors.push('Saat seçilmelidir');
                }
                
            },
             validEmail: function (email) {
              var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
              return re.test(email);
            }
        },
        mounted() {
           axios.get('http://127.0.0.1:8000/api/calisma-saatleri')
           .then((cevap)=>{
               this.workingHours=cevap.data;
               console.log(cevap.data);
               
           })
        }
    }
</script>
