<template>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Purchase ID</th>
        <th>Offering title</th>
        <th>Quantity</th>
        <th>Unit price</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(purchase, index) in purchases" :key="index">
        <td>{{ purchase.id }}</td>
        <td>{{ purchase.offering.title }}</td>
        <td>{{ purchase.quantity }}</td>
        <td>${{ purchase.offering.price }}</td>
        <td>${{ (purchase.offering.price * purchase.quantity).toFixed(2) }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
// @ is an alias to /src
import axios from 'axios'
export default {
  data () {
    return {
      purchases: ''
    }
  },
  methods: {
    getPurchases () {
      axios.get('/api/purchases')
        .then(response => {
          console.log(response.data)
          console.log(response.data.purchases)
          if (response.data.purchases.length) {
            this.purchases = response.data.purchases
          }
        })
    }
  },
  created () {
    this.getPurchases()
  }
}
</script>
