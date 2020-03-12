<template>
    <span class="mr-5 hidden-sm-and-down">
         {{name}} 
    </span>
</template>


<script>
    export default {
        mounted() {
            console.log("OJO ACA SI SE MONTO")
           this.axios.get('api/user', {
                headers: {
                    Authorization: 'Bearer ' + this.$store.state.token,
                    Accept:'application/json' 
                }
                }).then((response) => {
                    this.name=response.data.name;
                     console.log(response.data)
                })
                .catch(error => {
                    console.log(error)
                    
                });
            
        },
        data:()=>({
            name:''
        }),
        methods:{
            getName(){
                
                

            }
        }
    }
</script>