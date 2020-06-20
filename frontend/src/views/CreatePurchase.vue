<template>
  <div>
    <div class="form-group">
      <label for="customerName">Customer Name</label>
      <input
        type="text"
        class="form-control"
        id="customerName"
        v-model="customerName"
        placeholder="Customer Name">
    </div>
    <div class="form-group">
      <label for="customerName">Offering</label>
      <select
        class="form-control"
        v-model="offeringId"
        id="offeringId">
        <option v-for="offering in offerings" :key="offering.id" :value="offering.id">{{ offering.title }}</option>
      </select>
    </div>
    <div class="form-group">
      <label for="customerName">Quantity</label>
      <input
        type="number"
        class="form-control"
        id="quantity"
        v-model="quantity"
        placeholder="Quantity">
    </div>
    <button
      type="button"
      class="btn btn-primary"
      @click="createPurchase">Submit</button>
  </div>
</template>

<script>
// @ is an alias to /src
import axios from 'axios'
export default {
  data () {
    return {
      customerName: '',
      quantity: '',
      offeringId: '',
      offerings: []
    }
  },
  methods: {
    createPurchase () {
      const purchase = {
        customerName: this.customerName,
        quantity: this.quantity,
        offeringID: this.offeringId
      }
      console.log(purchase)

      axios.post('/api/purchases', purchase)
        .then(response => {
          console.log(response)
        })
    },
    getOfferings () {
      axios.get('/api/offerings', { crossdomain: true })
        .then(response => {
          if (response.data.offerings.length) {
            this.offerings = response.data.offerings
          }
        })
    }
  },
  created () {
    this.getOfferings()
  }
}
</script>
