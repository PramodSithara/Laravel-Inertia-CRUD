<script setup>
import { useForm } from '@inertiajs/vue3';
import {router} from '@inertiajs/vue3';

defineProps({
    errors:Object
});

const form = useForm({
    name:null,
    image:null,
    age:null,
    status:null,
});

function handleFileChange(event) {
    form.image = event.target.files[0];
}

function submit(){
    router.post('/student',form)
}

</script>

<template>
        <Head title="Create" />

        <div class="card col-6 offset-3 mt-2">
        <div class="card-header">
            Create Student
        </div>
            <div class="card-body mt-2">
                <form @submit.prevent="submit">
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
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                            <div class="text-danger text-xs" v-if="errors.status">{{ errors.status }}</div>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
        
</template>