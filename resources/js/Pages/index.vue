<script setup>
defineProps({ student: Object });
import {router} from '@inertiajs/vue3';

function destroy(id){
    router.delete('/student/'+id)
}

function edit(id){
    router.get('/student/'+id+'/edit');
}

function addNew(){
    router.get('/student/create');
}


</script>

<template>
    <Head title="Student" />

    <br><br>
    
  <button @click.prevent="addNew()" class="btn btn-success mb-2">Add Student</button>

  <div class="card col-12 ">
    <div v-if="$page.props.flash.message" class="alert alert-success">
    <strong>{{$page.props.flash.message}}</strong>
    </div>
    <table class="table table-bordered table-hover table-striped table-sm" style="width: 100%; font-size: 16px;">
      <thead class="thead-dark">
        <tr>
          <th style="width: 10%;">ID</th>
          <th style="width: 20%;">Name</th>
          <th style="width: 20%;">Image</th>
          <th style="width: 15%;">Age</th>
          <th style="width: 15%;">Status</th>
          <th style="width: 50%;">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="student in student">
          <td>{{ student.id }}</td>
          <td>{{ student.name }}</td>
          <td>
            <img v-if="student.image" :src="student.image" alt="Student Image" style="max-width: 100%; max-height: 100px;">
            <span v-else>No Image</span>
          </td>
          <td>{{ student.age }}</td>
          <td>{{ student.status }}</td>
          
          <td>
            <button @click.prevent="edit(student.id)" class="btn btn-outline-primary me-2">Edit</button>
            <button @click.prevent="destroy(student.id)" class="btn btn-outline-danger">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default {
    setup(props) {
      console.log('Student Data:', props.student);
      return { ...props };
    },
  };
</script>
