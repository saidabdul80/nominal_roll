<template>    
    <div class="row mb-3 col-md-4 mx-auto">
        <label for="rank" class="col-md-4 col-form-label text-md-end">Rank</label>
        <div class="col-md-8">
            <select id="rank" class="form-control" name="rank"  required autofocus>
                <option value="">Select Rank</option>
                <option v-for="rank in ranks" :selected="selrank==rank.abbr" :key="rank.id" :value="rank.id" >{{rank.abbr}}</option>
            </select>            
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return {                
                ranks:{}
            }
        },
        computed:{
            selrank:function(){
                return this.rank;
            }
        },
        props:["rank"],
        methods: {
            reverseMessage: function () {
            this.message = this.message.split('').reverse().join('')
            }
        },
        created(){
            axios.get("/allrank")
            .then(response => (
                this.ranks = response.data
                )
            ).catch(error => console.log(error))
        }
    }

</script>