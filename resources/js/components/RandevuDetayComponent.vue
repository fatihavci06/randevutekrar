<template>
<transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">
                <button class="btn btn-danger btn-block" @click="$emit('close')">
                  Kapat
                  </button>
              <div class="modal-header">
                <slot name="header">
                  {{data.fullname}}
                </slot>
              </div>

              <div class="modal-body">
                
                 {{data.phone}}<br/>
                 {{data.email}}<br/>
                <p >{{saat}}<p/>
              </div>
              <div>NOTLAR</div>
              <div v-for="item in veri">
                  
                  {{item.text}}
              </div>

              <div class="modal-footer">
                <slot name="footer">
                    
                    <textarea rows="3" cols="50" v-model="text"></textarea>
                  <button class="btn btn-primary btn-block" @click="store">
                    Kaydet
                  </button>
                
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
</template>

<script>
    export default {
    props: ['modal_id'],
    data(){
            return{
                text:'',
                veri:[],
                saat:[],
                isModalVisible: false,
                data:[]
                
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            this.getData();
            
        },
        methods:{
            store:function(){
                 axios.post('http://127.0.0.1:8000/api/not-ekle/',{
                    id:this.modal_id,
                    text:this.text
                 })
               .then((cevap)=>{
                console.log(cevap);
                this.text="";
                   this.getData();
               })
            },
            getData:function(){
                axios.get('http://127.0.0.1:8000/api/randevu-detay/'+this.modal_id)
               .then((cevap)=>{
                  this.data=cevap.data;
                  this.veri=cevap.data.randevunotu;
                  
                  this.saat=cevap.data.saatadi.hours;

                  
               })
            }
        }
    }
</script>
