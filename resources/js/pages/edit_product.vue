<template>
    <div class="container">
        <form v-on:submit.prevent>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" v-model="form.name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Price</label>
                <input type="number" class="form-control" v-model="form.price" id="exampleInputPassword1" placeholder="" >
            </div>
             <div class="form-group">
                <label for="exampleInputPassword1">Tags</label>
                      <Select v-model="form.tags" multiple >
                        <Option v-for="item in tags" :value="item.id" :key="item.id">{{ item.name }}</Option>
                    </Select>
            </div>
            <div v-if="form.tags.length>0">
                            <div v-for="(i,x) in form.tags" :key="x">
                                <span v-if="x!==0"  >,</span>
                                <span >{{i.tag.name}}  </span> 
                            </div>
                        </div>
            
            <button type="submit" class="btn btn-primary" @click="formSubmit">Submit</button>
            </form>
    </div>
</template>
<script>
export default {
    data(){
        return{
            product:{},
             form:{
                name:'',
                price:'',
            }, tags:[]
        }
    },
    methods :{
        async single_products(){
            const [ res1, res2] = await Promise.all([
            this.callApi('get',`product/${this.$route.params.id}`),
            this.callApi('get','all_tag')
        ])
        if(res1.status == 200 && res2.status == 200){
            this.product = res1.data
            this.form = _.clone(this.product)
            this.tags = res2.data
        }
        },
        async formSubmit(){
            if(this.form.name == '') return this.i("Product Name is Empty!")
            if(this.form.price == '') return this.i("Product Price is Empty!")
            if(this.form.tags.length <=0) return this.i("Product Tags is Empty!")
            this.form.id = this.product.id

            const res = await this.callApi('post','edit_product',this.form)
            if(res.status == 200){
                this.s(' Product have been successfully Updated!')
                this.$router.push(`/product/${this.product.id}`)
            }
            else{
                this.swr()
            }

        },
    },
    created(){
        //console.log(this.$route)
        this.single_products();

    }
}
</script>