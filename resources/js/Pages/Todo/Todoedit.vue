<template>
     <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                   <form @submit.prevent="form.patch(route('tdlists.update', tdlist.id), //display value untuk satu id sahaja
                   {
                       onSuccess: () => form.reset(),
                   })">
                       <input class="form-control text-center" type="text" placeholder="To Do List" v-model="form.tdlist"/>
                        <div v-if="form.errors.tdlist">{{ form.errors.tdlist }}</div>
                       <br/>
                       <center><button class="bg-blue-300 hover:bg-blue-500 text-black py-2 px-4 rounded" type="submit" :disabled="form.processing"><i class="fas fa-pen"></i>&nbsp Update To Do List</button></center></br>
                       <center><input type="button" class="bg-gray-300 hover:bg-gray-500 text-black py-2 px-4 rounded my-3" value="Cancel" onclick="if(confirm('Are you sure you want to cancel?')) history.back();" /></center>
                    </form>
               </div>
           </div>
       </div>
</template>

<script>
    export default {
         props: {
            tdlist: Object,
            }, 
    data() {
    return {
      form: this.$inertia.form({
        tdlist: this.tdlist.name, //'tdlist' display dekat console dalam web
      }),
    }
  },
};
</script>