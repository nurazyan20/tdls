<template>
       <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">               
                 <table class="table-fixed w-full text-center">
                     <thead>
                            <tr class="border px-4 py-2">
                                <th class="border px-4 py-2"><b>To Do List</b></th>
                                <th class="border px-4 py-2"><b>Action</b></th>
                            </tr>
                        </thead>
                    <tbody>
                        <tr v-for="(tdlist, index) in tdlists" :key="index"> 
                            <td class="border px-4 py-2">{{tdlist.name}}</td> 
                            <td class="border px-4 py-2">
                                <button @click="editTd(tdlist)" class="bg-yellow-300 hover:bg-yellow-500 text-black py-2 px-4 rounded"><i class="fas fa-pen"></i>&nbsp Edit</button>&nbsp;                                
                                <button @click="deleteTd(tdlist)" class="bg-red-300 hover:bg-red-500 text-black py-2 px-4 rounded"><i class="fas fa-trash"></i>&nbsp Delete</button>                   
                           </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
</template>

      

     
<script>
export default {
  props: {
            tdlists: Array,
            }, 

    methods: {

         editTd(tdlist) {
            console.log("tdlist", tdlist), 
            this.$inertia.get(route("tdlists.edit", tdlist.id))
            
        },

        //tdlist is from model
        deleteTd(tdlist) {
             console.log("tdlist", tdlist);
            if (!confirm('Are you sure you want to delete?')) return;
            this.$inertia.delete(route("tdlists.destroy", tdlist.id), {
                onSuccess: () => {
                    console.log("success");
                }
            }
            )  
        }
    }
};
</script>