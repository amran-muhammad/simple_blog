<template>
	<table class="table table-dark" style="width: 100%">
	<thead>
		<tr>
			
			<th class="product-name">Product</th>
			<th class="product-name">Quantity</th>
			<th class="product-name">Rate</th>
			<th class="product-price ">Price</th>
			<th class="product-price ">Remove</th>
			
		</tr>
	</thead>
	<tbody>
		<tr class="product-item-details" v-for="(item,index) in cartItem" :key="index" >
			

			<td class="product-name pr-4">
				<span class="pr-4"> {{item.name}}</span>
			</td>
			<td>
				<template v-if="editQuantity">
					<template>
					    <InputNumber :max="10" :min="1" v-model="item.quantity"></InputNumber>
					   
					</template>
					<button @click="editOff">ok</button>
				</template>

				<template v-else>{{item.quantity}}</template>
				
			</td>
			<td>
				{{item.price}}
			</td>


			<td class="product-price">
				
			
				<template>
					<span class="pr-4">{{item.price*item.quantity}}</span>
				</template>
				
			</td>
			<td>
				<button @click="delete_item(item,index)">Remove</button>
			</td>
			

			
		</tr>
		<tr><template v-if="totalButtonisClicked"> TOTAL AMOUNT = {{total}}</template></tr>
		
		
	</tbody>
	<button class="btn btn-secondary" @click="edit">Edit</button>
	<button class="btn btn-success" @click="totalCart">TOTAL</button>
	

	
</table>
									

	
							
</template>

<script>
export default {
	data(){
            return{
            editQuantity: false,
            totalButtonisClicked: false,
            total:0
            
            }
	},
	methods:{
		edit(){

			this.editQuantity = true
			this.totalButtonisClicked = false
		},
		editOff(){

			this.editQuantity = false
			this.totalCart();
		},
		totalCart(){
			this.total=0
			this.totalButtonisClicked = true
			for (var i = 0; i < this.cartItem.length; i++) {
				this.total +=this.cartItem[i].price*this.cartItem[i].quantity
				
			}
			return this.total
		},
		delete_item(item,index){
			this.cartItem.splice(index,1)
			this.totalButtonisClicked = false
		}
		
	}
	
	
}
</script>

<style>
.ontinue-shop_user{
	color: white;
    background: #3c3c9a;
}
._price_withourdel{
	font-size: 16px;
}
</style>

