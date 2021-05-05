<template>
     <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray overflow-hidden shadow-xl sm:rounded-lg p-6">
                   <form @submit.prevent="form.post(route('tdlists.store'), //data yang dimasukkan akan distore dalam function store dalam controller
                   {
                       onSuccess: () => form.reset(),
                   })">
                       <center><h5><b>Please Enter Your New To Do List : </b></h5></center></br>
                       <input class="form-control text-center" type="text" placeholder="To Do List" v-model="form.name"/>
                        <div v-if="form.errors.name">{{ form.errors.name }}</div>
                       <br/>
                       <center><button class="bg-blue-300 hover:bg-blue-500 text-black py-2 px-4 rounded my-3"><i class="fas fa-plus-square"></i>&nbsp Create New List</button></center>
                    </form>
               </div>
           </div>
       </div>
</template>

<script>
    export default {
    data() {
    return {
      form: this.$inertia.form({
        name: null,
      }),
    }
  },
};
</script>