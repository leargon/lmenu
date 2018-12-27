<template>
	<div>
		<h2>Меню</h2>
		<div class="row">
			<div class="card card-body mb-2 col-md-3 mr-2" v-for="men in menus" v-bind:key="men.id">
		      <h3>{{ men.title }}</h3>
		      <p class="display-4">{{ men.price }} тг</p>
		      <input type="checkbox" :value="men.id" v-model="men_id" style="transform:scale(1.3); opacity:0.9; cursor:pointer;">
		    </div>

	    </div>
	    <button @click="postOrder()" class="btn btn-warning mb-2">Заказать</button>
	</div>
	
</template>

<script>
	export default {
	  data() {
	    return {
	      menus: [],
	      men: {
	        id: '',
	        title: '',
	        price: ''
	      },
	      men_id: [],
	      pagination: {},
	      edit: false
	    };
	  },
	  created() {
	    this.fetchMenu();
	  },
	  methods: {
	    fetchMenu() {
	      fetch('/api/menu')
	        .then(res => res.json())
	        .then(res => {
	        	this.menus = res.data;
	        });
	    },
	    postOrder() {
	    	var request = {
			  orders: this.men_id,
			};
	    	// fetch(`/api/menu/order/${id}`)
	    	// 	.then(alert('Заказ сделан '+ id));
	    	axios.post('/order', request)
	    	.then(alert('Заказ сделан '));
	    }
	  }
	};
</script>