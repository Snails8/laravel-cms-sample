<template>
  <button v-bind:class="['btn', is_contract ? 'btn-primary' : 'btn-danger']" v-on:click="handleClick">{{ status[is_contract] }}</button>
</template>
<script>
const axios = require('axios');
export default{
  props: {
    updateId: Number,
    isContract: Number,
    target: String,
  },

  data(){
    return{
      update_id: Number(this.updateId),
      is_contract: Number(this.isContract),
      status:{
        0: '解約済',
        1: '契約中'
      },
    }
  },

  methods:{
    handleClick:function () {

      this.is_contract ^= 1;

      // DBの型に合わせる
      let contractStatus = (this.is_contract);

      let data = {
        'is_contract': contractStatus,
      };

      axios.put('/ajax/' + this.target + '/' + this.update_id + '/is_contract', {data} );
    }
  }
}
</script>
