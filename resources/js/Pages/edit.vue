<script setup>
import {useForm} from '@inertiajs/vue3';
import {router} from '@inertiajs/vue3';
const props=defineProps({
    errors: Object,
    student: Object,
})

const form =useForm({
    name:props.student.name,
    age:props.student.age,
    status:props.student.status,
})

function submit(id){
    router.put('/student/'+id,form);
}

</script>

<template>
        <Head title="Edit" />

        <div class="card col-6 offset-3 mt-2">
        <div class="card-header">
            Edit Student
        </div>
            <div class="card-body mt-2">
                <form @submit.prevent="submit(student.id)">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" v-model="form.name" placeholder="Enter Name">
                        <div class="text-danger text-xs" v-if="errors.name">{{ errors.name }}</div>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" @change="handleFileChange">
                        <div class="text-danger text-xs" v-if="errors.image">{{ errors.image }}</div>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" v-model="form.age" placeholder="Enter Age">
                        <div class="text-danger text-xs" v-if="errors.age">{{ errors.age }}</div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-select" id="status" v-model="form.status" name="status">
                            <option value="active">active</option>
                            <option value="inactive">Inactive</option>
                            <div class="text-danger text-xs" v-if="errors.status">{{ errors.status }}</div>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
</template>