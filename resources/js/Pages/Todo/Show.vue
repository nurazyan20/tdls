<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-black-800 leading-tight">
                {{ $page.props.user.name }}'s To Do List
            </h2>
        </template>&nbsp;
<todoform />
<todolist :tdlists="tdlists" /> 
        
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Todoform from './Todoform.vue'
    import Todolist from './Todolist.vue'

    export default {
        components: {
            AppLayout,
            Todoform,
            Todolist,
        },
        props: {
            tdlists: Array, //variable 'tdlists' daripada Tdlistcontroller
        },
    };
        
</script>


   