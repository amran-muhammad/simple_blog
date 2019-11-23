<template>
    <div class="container">
        
        <h1>All Products</h1>

        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Tags</th>
                <th scope="col">Average Rating</th>
                <th scope="col">Price</th>
                <th scope="col">Add To Cart</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,index) in products" :key="index">
                    <th scope="row">{{index+1}}</th>
                    <td>
                        <router-link :to="`/product/${item.id}`"  >{{item.id}} </router-link>
                    </td>
                    <td>
                        <router-link :to="`/product/${item.id}`"  >{{item.name}} </router-link>
                        </td>
                    <td>{{item.category.name}}</td>
                    <td>
                        <div v-if="item.tags.length>0">
                            <div v-for="(i,x) in item.tags" :key="x">
                                <span v-if="x!==0"  >,</span>
                                <span >{{i.tag.name}}  </span> 
                            </div>
                        </div>
                    </td>
                    <td>
                        <template v-if="item.average">
                            <template v-for="i in 5">
                                <span :class="(item.average.averageRating >= i) ? 'fa fa-star checked' : 'fa fa-star' "></span>
                            </template>
                        </template>
                        
                        <template v-else>
                        <i>no rating here</i>
                        </template>
                    </td>
                    <td>{{item.price}}</td>
                    <td><button @click="addItemToCart(item)">ADD CART</button></td>
                </tr>
            </tbody>
            </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            products:[],
            isActive:false

        }
    },
    methods:{
        async all_products(){
            const res = await this.callApi('get','all_product')
            if(res.status == 200){
                this.products = res.data
            }
        },
        addItemToCart(p){
           this.addNewItemToCart(p);
           }
    },
    created(){
        this.all_products();
        
    },
    // computed:{
    //     message(){
    //         return this.store.state.message
    //     }
    // }
}
</script>