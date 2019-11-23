<template>
    <div class="container">
        
        <h1>All Products</h1>
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Average Rating</th>
                <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item,index) in products" :key="index">
                   
                    <td v-if="item.products">
                        <router-link :to="`/product/${item.id}`"  >{{item.id}} </router-link>
                    </td>
                    <td v-if="item.products">
                        <router-link :to="`/product/${item.id}`"  >{{item.products.name}} </router-link>
                        </td>
                    
                   <td v-if="item.products && item.products.category">{{item.products.category.name}}</td>
                    <td>
                        <template v-if="item.products && item.products.average">
                            <template v-for="i in 5">
                                <span :class="(item.products.average.averageRating >= i) ? 'fa fa-star checked' : 'fa fa-star' "></span>
                            </template>
                        </template>
                        
                        <template v-else>
                        <i>no rating here</i>
                        </template>
                    </td>
                    <td v-if="item.products">{{item.products.price}}</td>
                </tr>
            </tbody>
            </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            products:[]

        }
    },
    methods:{
        async all_products(){
            const res = await this.callApi('get',`all_tag/${this.$route.params.id}`)
            if(res.status == 200){

                this.products = res.data
                //console.log(this.products)
            }
        }
    },
    created(){
        this.all_products();
    }
}
</script>