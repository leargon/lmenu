<template>
	<div>
		<h2>Меню</h2>
		<div class="card card-body mb-2" v-for="men in menus" v-bind:key="men.id">
	      <h3>{{ men.title }}</h3>
	      <p class="display-4">{{ men.price }} тг</p>
	      <button @click="postOrder(men.id)" class="btn btn-warning mb-2">Заказать</button>
	    </div>
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
	      men_id: '',
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
	    postOrder(id) {
	    	fetch(`/api/menu/order/${id}`)
	    		.then(alert('Заказ сделан '+ id));
	    }
	  }
	};
</script>